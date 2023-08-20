@extends('admin.main')

@section('content')
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> {{ $data->store->name }}
                    <small class="float-right">{{ $data->created_at ? $data->created_at->format('Y-m-d') : '' }}</small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Thông Tin Cửa Hàng
                <address>
                    <strong>{{ $data->store->name }}</strong><br>
                    {{ $data->store->address }}<br>
                    Số Điện Thoại: {{ $data->store->user->phone }}<br>
                    Email: {{ $data->store->user->email }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Thông Tin Khách Hàng
                <address>
                    <strong>{{ $data->user->fullname }}</strong><br>
                    {{ $data->user->detailAddress->address }}<br>
                    Số Điện Thoại: {{ $data->user->phone }}<br>
                    Email: {{ $data->user->email }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Hóa Đơn #{{ $data->id }}</b><br>
                <br>
                <b>Mã Đơn Hàng:</b> {{ $data->order_code }}<br>
                <b>Ngày Thanh Toán:</b> {{ $data->pay_date }}<br>
                <b>Mã Giao Dịch:</b> {{ $data->transaction_no }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Thuốc</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Tổng Phụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sumTotal = 0; ?>
                        @foreach ($data->detail as $key => $item)
                            <?php $sumTotal = $sumTotal + $item->price ?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total_price, 0, ',', '.') }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                @if ($data->payment == 1)
                    <p class="lead">Phương Thức Thanh Toán:</p>
                    <img src="/assets/admin/dist/img/credit/visa.png" alt="Visa">
                    <img src="/assets/admin/dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="/assets/admin/dist/img/credit/american-express.png" alt="American Express">
                    <img src="/assets/admin/dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        @if ($data->paid == 1)
                            Đơn hàng này đã được thanh toán
                        @else
                            Đơn hàng này chưa được thanh toán
                        @endif
                    </p>
                @else
                    <p class="lead">Phương Thức Thanh Toán:</p>
                        Thanh toán sau khi nhận hàng

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        @if ($data->paid == 1)
                            Đơn hàng này đã được thanh toán
                        @else
                            Đơn hàng này chưa được thanh toán
                        @endif
                    </p>
                @endif
                
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Tóm tắt tổng đơn hàng</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Tổng Phụ:</th>
                            <td>{{ number_format($sumTotal, 0, ',', '.') }} VND</td>
                        </tr>
                        {{-- <tr>
                            <th>Thuế (9.3%)</th>
                            <td>$10.34</td>
                        </tr> --}}
                        <tr>
                            <th>Phí Vận Chuyển:</th>
                            <td>{{ number_format($data->shipping_fee, 0, ',', '.') }} VND</td>
                        </tr>
                        <tr>
                            <th>Tổng:</th>
                            <td>{{ number_format($sumTotal + $data->shipping_fee, 0, ',', '.') }} VND</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <a href="/expert/orders" class="btn btn-default"> Quay Lại</a>
            </div>
        </div>
        {{-- <div class="row no-print">
            <div class="col-12">
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                        class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                </button>
            </div>
        </div> --}}
    </div>
@endsection

@section('linkscript')
@endsection
