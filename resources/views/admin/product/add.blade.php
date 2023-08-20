@extends('admin.main')

@section('content')
<div class="col-sm-6 mr-auto">
    <form action="/admin/products/add" method="POST" enctype= multipart/form-data>
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="dis_id">Hoạt Chất</label>
                <select class="form-control" name="therapy_id" id="therapy_id" placeholder="Vui lòng chọn hoạt chất">
                    <option value="0">Chọn</option>
                    @foreach ($listThe as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Tên Thuốc</label>
                        <input class="form-control" name="name" id="name" placeholder="Vui lòng nhập tên thuốc">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="instruction">Hướng Dẫn Sử Dụng</label>
                        <textarea rows="6" class="form-control" name="instruction" id="instruction" placeholder="Vui lòng nhập hướng dẫn sử dụng"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="uses">Công Dụng</label>
                <textarea rows="6" class="form-control" name="uses" id="uses" placeholder="Vui lòng nhập công dụng"></textarea>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="manufacturer">Nhà Sản Xuất</label>
                        <input class="form-control" name="manufacturer" id="manufacturer" placeholder="Vui lòng nhập nhà sản xuất">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="reg_number">Số Đăng Ký</label>
                        <input class="form-control" name="reg_number" id="reg_number" placeholder="Vui lòng nhập số đăng ký">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Trạng Thái</label>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="1" id="active" name="status"
                                checked="">
                            <label for="active" class="custom-control-label">Hiện</label>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="0" id="no_active" name="status">
                            <label for="no_active" class="custom-control-label">Ẩn</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Tải Ảnh Thuốc</label>
                <input type="file" class="form-control" name="photos[]" multiple />
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a type="button" href="/admin/products/list" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-info f-right">Tạo</button>
        </div>
    </form>
</div>
    
@endsection
