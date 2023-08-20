@extends('admin.main')

@section('content')
    <div class="container-fluid">
        @if (Auth::user()->status == 0)
            <div class="row">
                <h5 class="fw-bold">TÀI KHOẢN CỦA BẠN CHƯA ĐƯỢC XÁC THỰC, VUI LÒNG CHỜ ADMIN DUYỆT</h5>
            </div>
        @else
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $newOrder }}</h3>

                            <p>Đơn hàng mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/expert/orders" class="small-box-footer">Xem chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>{{ $totalMonth }}<sup style="font-size: 20px">VND</sup></h3> --}}
                            <h3>{{ number_format($totalMonth, 0, ',', '.') }}<sup style="font-size: 20px">VND</sup></h3>

                            <p>Tổng doanh thu trong tháng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/expert/reports" class="small-box-footer">Xem chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $productStore }}</h3>

                            <p>Thuốc có sẵn</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/expert/stores" class="small-box-footer">Xem chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $outOfStock }}</h3>

                            <p>Hết hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem chi tiết <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Đơn đặt hàng mới nhất</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tên Đơn Hàng</th>
                                    <th>Trạng Thái</th>
                                    <th>Địa Chỉ</th>
                                    <th>Ngày Tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listNewOrder as $item)
                                    <tr>
                                        <td><a href="#">{{ $item->order_code }}</a></td>
                                        <td>{{ $item->description }}</td>
                                        @if ($item->status == 1)
                                            <td><span class="badge badge-warning">Đang Xử Lý</span></td>
                                        @elseif($item->status == 2)
                                            <td><span class="badge badge-info">Vận Chuyển</span></td>
                                        @elseif($item->status == 3)
                                            <td><span class="badge badge-success">Đã Giao Hàng</span></td>
                                        @elseif($item->status == 4)
                                            <td><span class="badge badge-danger">Đã Hủy</span></td>
                                        @endif
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                {{ $item->address->address }}</div>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                    <a href="/expert/orders" class="btn btn-sm btn-secondary float-right">Xem tất cả đơn hàng</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        @endif

    </div><!-- /.container-fluid -->
@endsection
