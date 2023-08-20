@extends('admin.main')

@section('content')
    <form action="/admin/menu/edit/{{ $menu->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input class="form-control" value="{{ $menu->name }}" name="name" id="name" placeholder="Vui lòng nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="parent_id">Danh mục</label>
                <select class="form-control" name="parent_id" id="parent_id" placeholder="Vui lòng chọn 1 danh mục">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }} >Danh mục cha</option>
                    @foreach ($parents as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $menu->parent_id ? 'selected' : '' }} >
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" name="description" id="description" placeholder="Mô tả danh mục"> {{ $menu->description }} </textarea>
            </div>

            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea class="form-control" name="content" id="content" placeholder="Mô tả chi tiết danh mục"> {{ $menu->content }} </textarea>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="1" id="active" name="active"
                                {{ $menu->active == 1 ? 'checked=""' : '' }} checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="0" id="no_active" name="active"
                            {{ $menu->active == 0 ? 'checked=""' : '' }}>
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhập</button>
        </div>
    </form>
@endsection

@section('linkscript')
<script src="/ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
