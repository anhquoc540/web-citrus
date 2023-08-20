@extends('admin.main')

@section('content')
<div class="col-sm-6 mr-auto">
    <form action="/admin/therapies/add" method="POST">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="dis_id">Bệnh</label>
                <select class="form-control" name="dis_id" id="dis_id" placeholder="Please select disease">
                    <option value="0">Chọn</option>
                    @foreach ($listDis as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Tên Hoạt Chất</label>
                        <input class="form-control" name="name" id="name" placeholder="Please enter name">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả</label>
                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
            </div>

            <div class="form-group">
                <label>Chất Hóa Học</label>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="1" id="active" name="is_chemical"
                                checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="0" id="no_active" name="is_chemical">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a type="button" href="/admin/therapies/list" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-info f-right">Tạo</button>
        </div>
    </form>
</div>
    
@endsection
