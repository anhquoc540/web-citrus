@extends('admin.main')

@section('content')

<div class="container-fluidr">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Danh sách đăng kí cửa hàng mới nhất</h3>

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
                            <th>STT</th>
                            <th>Họ Và Tên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Tên Cửa Hàng</th>
                            <th>Địa Chỉ Cửa Hàng</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Đămg Ký</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    {{ $item->phone }}</div>
                                </td>
                                <td>
                                    {{ $item->store ? $item->store->name : '' }}</div>
                                </td>
                                <td>
                                    {{ $item->store ? $item->store->address : '' }}</div>
                                </td>
                                @if ($item->status == 1)
                                    <td><span class="badge badge-success">Đã Kích Hoạt</span></td>
                                @elseif($item->status == 0)
                                    <td><span class="badge badge-warning">Chưa Kích Hoạt</span></td>
                                @endif
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
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
            <a href="/admin/approves" class="btn btn-sm btn-secondary float-right">Xem tất cả</a>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>

@endsection