@extends('admin.main')

@section('content')
    <div class="col-sm-6 mr-auto">
        <form action="/admin/products/edit/{{ $product->id }}" method="POST" enctype= multipart/form-data>
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="form-group">
                    <label for="dis_id">Hoạt Chất</label>

                    <select class="form-control" name="therapy_id" id="therapy_id" placeholder="Please select disease">
                        <option value="0" {{ $product->therapy_id == 0 ? 'selected' : '' }}>Chọn</option>
                        @foreach ($listThe as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $product->therapy_id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Tên Thuốc</label>
                            <input class="form-control" value="{{ $product->name }}" name="name" id="name"
                                placeholder="Please enter name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="instruction">Hướng Dẫn Sử Dụng</label>
                            <textarea rows="6" class="form-control" name="instruction" id="instruction"
                                placeholder="Please enter instruction"> {{ $product->instruction }} </textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="uses">Công Dụng</label>
                    <textarea rows="6" class="form-control" name="uses" id="uses" placeholder="Please enter uses"> {{ $product->uses }} </textarea>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="manufacturer">Nhà Sản Xuất</label>
                            <input class="form-control" value="{{ $product->manufacturer }}" name="manufacturer"
                                id="manufacturer" placeholder="Please enter manufacturer">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="reg_number">Số Đăng Ký</label>
                            <input class="form-control" value="{{ $product->reg_number }}" name="reg_number" id="reg_number"
                                placeholder="Please enter reg_number">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Trạng Thái</label>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="1" id="active"
                                    name="status" {{ $product->status == 1 ? 'checked=""' : '' }} checked="">
                                <label for="active" class="custom-control-label">Hiện</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="0" id="no_active"
                                    name="status" {{ $product->status == 0 ? 'checked=""' : '' }}>
                                <label for="no_active" class="custom-control-label">Ẩn</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Post -->
                <div class="form-group">
                    <label>Tải Ảnh Thuốc</label>
                    <input type="file" class="form-control" name="photos[]" multiple />
                    <div class="row mb-3 mg-top-24">
                        @if (json_decode($product->photo))
                            @foreach (json_decode($product->photo) as $el)
                                <div class="col-sm-3">
                                    <img class="img-fluid mb-3" src="{{ $el }}" alt="Photo">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.post -->

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a type="button" href="/admin/products/list" class="btn btn-secondary">Hủy</a>
                <button type="submit" class="btn btn-info f-right">Cập Nhập</button>
            </div>
        </form>
    </div>
@endsection

@section('linkscript')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
