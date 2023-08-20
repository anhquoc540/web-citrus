@extends('admin.main')

@section('content')
<div class="col-sm-6 mr-auto">
    <form action="/admin/diseases/add" method="POST" enctype= multipart/form-data>
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Tên Bệnh</label>
                        <input class="form-control" name="name" id="name" placeholder="Vui lòng nhập tên bệnh">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="characteristic">Triệu Chứng</label>
                <textarea rows="6" class="form-control" name="characteristic" id="characteristic" placeholder="Vui lòng nhập triệu chứng"></textarea>
            </div>
            <div class="form-group">
                <label for="reason">Nguyên Nhân Gây Bệnh</label>
                <textarea rows="6" class="form-control" name="reason" id="reason" placeholder="Vui lòng nhập nguyên nhân gây bệnh"></textarea>
            </div>
            <div class="form-group">
                <label>Tải Ảnh Bệnh</label>
                <input type="file" class="form-control" name="photos[]" multiple />
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a type="button" href="/admin/diseases/list" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-info f-right">Tạo</button>
        </div>
    </form>
</div>
    
@endsection
