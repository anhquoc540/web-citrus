@extends('admin.main')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/assets/admin/dist/images/avatar.png"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $data->fullname }}</h3>

                            <p class="text-muted text-center">{{ $data->role_id == 3 ? 'Nông dân' : 'Quản trị viên' }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $data->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Số Điện Thoại</b> <a class="float-right">{{ $data->phone }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ngày Đăng Ký</b> <a
                                        class="float-right">{{ $data->created_at ? $data->created_at->format('Y-m-d') : '' }}</a>
                                </li>
                            </ul>
                            @if ($data->status == 1)
                                <a href="#" class="btn btn-block btn-info"><b>
                                        Đang Hoạt Động</b></a>
                            @elseif ($data->status == 0)
                                <a href="#" class="btn btn-block btn-warning"><b>
                                        Chưa Kích Hoạt</b></a>
                            @else
                                <a href="#" class="btn btn-block btn-danger"><b>
                                        Khóa</b></a>
                            @endif

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills custom-active">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Thông tin
                                        cập nhập</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form id='formUser' class="form-horizontal">
                                        @csrf
                                        <input id="user-id" hidden type="text" value="{{ $data->id }}" />
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Họ Và Tên</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="fullname" value="{{ $data->fullname }}"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" readonly value="{{ $data->email }}"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Số Điện Thoại</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" readonly value="{{ $data->phone }}"
                                                    placeholder="Phone">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Trạng Thái</label>
                                            <div class="col-sm-2">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" {{ $data->role_id == 1 ? 'disabled' : '' }} value="1" id="active" name="status"
                                                        {{ $data->status == 1 ? 'checked=""' : '' }} checked="">
                                                    <label for="active" class="custom-control-label">Hoạt Động</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" {{ $data->role_id == 1 ? 'disabled' : '' }} value="2" id="no_active" name="status"
                                                    {{ $data->status == 2 ? 'checked=""' : '' }}>
                                                    <label for="no_active" class="custom-control-label">Khóa</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-4">
                                                <button id="submit-btn" type="submit" class="btn btn-info">Cập nhập</button>
                                            </div>
                                            <div class="offset-sm-2 col-sm-4">
                                                <a type="button" href="/admin/users" class="btn btn-secondary f-right">
                                                    Hủy
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>


                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('linkscript')
    <script>
        $(function() {
            $("#submit-btn").click(function(ev) {
                var id = $('#user-id').val();
                var form = $("#formUser");
                $.ajax({
                    type: "PUT",
                    url: "/admin/users/" + id,
                    data: form.serialize(),
                    success: function(data) {
                        console.log(data);
                        // Ajax call completed successfully
                        alert("Cập nhập thành công!");
                        // location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        // Some error in ajax call
                        alert("some Error");
                    }
                });
            });
        })
    </script>
@endsection
