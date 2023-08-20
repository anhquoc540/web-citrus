@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Thông tin đơn hàng</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-info"><i class="fas fa-plus"></i> Thêm Sản Phẩm</button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Tên Thuốc</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng Phụ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="/assets/admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Some Product
                        </td>
                        <td>$13 USD</td>
                        <td>
                            <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                            </small>
                            12,000 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="/assets/admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Another Product
                        </td>
                        <td>$29 USD</td>
                        <td>
                            <small class="text-warning mr-1">
                                <i class="fas fa-arrow-down"></i>
                                0.5%
                            </small>
                            123,234 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="/assets/admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Amazing Product
                        </td>
                        <td>$1,230 USD</td>
                        <td>
                            <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                3%
                            </small>
                            198 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="/assets/admin/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Perfect Item
                            <span class="badge bg-danger">NEW</span>
                        </td>
                        <td>$199 USD</td>
                        <td>
                            <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                63%
                            </small>
                            87 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <table id="orders" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Tên Đơn Hàng</th>
                <th>Trạng Thái</th>
                <th>Thanh Toán</th>
                <th>Địa Chỉ</th>
                <th>Ngày Tạo</th>
                <th style="width: 116px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
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

                    @if ($item->paid == 1)
                        <td><span class="badge badge-primary">Đã Thanh Toán</span></td>
                    @else
                        <td><span class="badge badge-secondary">Chưa Thanh Toán</span></td>
                    @endif
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $item->address->address }}</div>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/expert/orders/{{ $item->id }}" ><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm btn-center" data-toggle="modal" data-target="#modal-lg"
                            onclick="editOrder({{ $item->id }})"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="#"
                            onclick="deleteOrder({{ $item->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    {{-- model update order --}}
    {{-- <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhập đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formId' action=''>
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="description">Tên đơn hàng</label>
                                <input class="form-control" name="description" id="description"
                                    placeholder="Vui lòng nhập tên đơn hàng">
                            </div>

                            <div class="row">
                                <label for="status">Trạng thái</label>
                                <select class="form-control" name="status" id="status">

                                </select>
                            </div>
                        </div>
                        <input hidden name="id" id="id" />
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="submitButton" class="btn btn-info">Lưu</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
@endsection

@section('linkscript')
    <script></script>
@endsection
