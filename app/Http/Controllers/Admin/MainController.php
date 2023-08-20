<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Message;
use App\Models\Order;
use App\Models\Price;
use App\Models\Store;
use App\Models\Cart;
use App\Models\Signature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function index()
    {
        $listExpertRegister = User::where('role_id', 2)->where('status', 0)->orderBy('created_at', 'DESC')->limit(10)->get();
        return view('admin.home.dashboard', ['title' => 'Trang Chủ', 'list' => $listExpertRegister]);
    }

    public function dashboard()
    {
        $store = Store::where('user_id', Auth::user()->id)->first();
        $newOrder = Order::where('store_id', $store->id)
            ->where('status', 1)
            ->count();
        $productStore = Price::where('store_id', $store->id)->count();

        $dayFist = date("Y-m-01 00:00:00");
        $currentDate = date('Y-m-d H:i:s');

        $orderSuccess = Order::where('store_id', $store->id)
            ->where('status', 3)
            ->where('created_at', '>=', $dayFist)
            ->where('created_at', '<=', $currentDate)
            ->get();

        $totalMonth = 0;
        foreach ($orderSuccess as $key => $value) {
            $totalMonth += $value->total - $value->shipping_fee;
        }

        $outOfStock = Price::where('store_id', $store->id)
            ->where('qty', 0)
            ->count();

        $listNewOrder = Order::where('store_id', $store->id)
            ->limit(7)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('expert.home.dashboard', [
            'title' => 'Dashboard',
            'newOrder' => $newOrder,
            'productStore' => $productStore,
            'totalMonth' => $totalMonth,
            'outOfStock' => $outOfStock,
            'listNewOrder' => $listNewOrder,
        ]
        );
    }

    public function chat()
    {
        return view('admin.chat.chat', ['title' => 'Chat']);
    }

    public function messages()
    {
        return Message::with('user')->get();
    }

    public function messageStore(Request $request)
    {
        $user = Auth::user();

        $messages = $user->messages()->create([
            'message' => $request->message,
        ]);

        broadcast(new SendMessage($user, $messages))->toOthers();

        return 'messages sent';
    }

    public function vnpayPayment(Request $request)
    {
        $allRequest = $request->all();

        $vnp_SecureHash = $allRequest['vnp_SecureHash'];
        $inputData = [];
        foreach ($allRequest as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $vnp_SecureHash) {
            if ($allRequest['vnp_ResponseCode'] == '00') {
                // echo "<span style='color:blue'>GD Thanh cong</span>";
                $this->updateOrderAfterPayment($allRequest['vnp_TxnRef']);
                $this->createSignature($allRequest);
                return redirect()->route('payment-success');
                // return view('vnpay.payment', ['title' => 'Payment', 'data' => $allRequest]);
            } else {
                // echo "<span style='color:red'>GD Khong thanh cong</span>";
                return redirect()->route('payment-error');
            }
        } else {
            // echo "<span style='color:red'>Chu ky khong hop le</span>";
            return redirect()->route('payment-error');
        }

    }

    public function vnpayPaymentError()
    {
        return view('vnpay.payment-error', ['title' => 'Payment Error']);
    }

    public function vnpayPaymentSuccess()
    {
        return view('vnpay.payment-success', ['title' => 'Payment Success']);
    }

    public function updateOrderAfterPayment($orderCode)
    {
        $order = Order::where('order_code', $orderCode)->first();
        $order->update(['paid' => 1]);
        $details = Detail::where('order_id', $order->id)->get();
        foreach ($details as $key => $value) {
            // update qty product of store
            $price = Price::where('store_id', $order->store_id)
                            ->where('product_id', $value->product_id)
                            ->first();
            $price->update([
                'qty' => $price->qty - $value->qty,
            ]);
        }

         // delete cart after create order
         Cart::where('user_id', $order->user_id)->delete();
    }

    public function createSignature($data)
    {
        Signature::create([
            'order_type' => $data['vnp_TxnRef'],
            'amount' => $data['vnp_Amount']/100,
            'order_info' => $data['vnp_OrderInfo'],
            'response_code' => $data['vnp_ResponseCode'],
            'transaction_no' => $data['vnp_TransactionNo'],
            'bank_code' => $data['vnp_BankCode'],
            'pay_date' => $data['vnp_PayDate'],
            'status' => $data['vnp_TransactionStatus'],
        ]);

    }

}
