<?php
namespace App\Http\Services\Custom;
use App\Models\Payment;

use App\Http\Services\BaseService;

class VnpayService extends BaseService
{

    public function __construct()
    {

    }

    public function createPayment($vnp_Amount, $vnp_TxnRef)
    {
        // $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        // $vnp_Amount = $_POST['amount']; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = ""; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" =>  config('vnpay.vnp_TmnCode'),
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => config('vnpay.vnp_Returnurl'),
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        Payment::create([
            'amount' => $vnp_Amount,
            'command' => "pay",
            'curr_code' => "VND",
            'ip_addr' => $vnp_IpAddr,
            'locale' => $vnp_Locale,
            'order_info' => "Thanh toan GD:" . $vnp_TxnRef,
            'order_type' => "other",
            'order_code' => $vnp_TxnRef,
            'bank_code' => $vnp_BankCode,
            'create_date' => date('YmdHis'),
            'expire_date' => $expire,
        ]);

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = config('vnpay.vnp_Url') . "?" . $query;
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');

        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return $vnp_Url;

        // header('Location: ' . $vnp_Url);
    }

}
