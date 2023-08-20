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

                            <p class="text-muted text-center">Chuyên gia</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $data->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Số Điện Thoại</b> <a class="float-right">{{ $data->phone }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ngày Đăng Ký</b> <a class="float-right">{{ $data->created_at ? $data->created_at->format('Y-m-d') : '' }}</a>
                                </li>
                            </ul>
                            @if ($data->status == 1)
                                <a href="#"
                                class="btn btn-block btn-info"><b>
                                    Đang Hoạt Động</b></a>
                            @elseif ($data->status == 0)
                                <a href="#"
                                class="btn btn-block btn-warning"><b>
                                    Chưa Kích Hoạt</b></a>
                            @else
                                <a href="#"
                                class="btn btn-block btn-danger"><b>
                                    Khóa</b></a>
                            @endif
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Cửa Hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Tên cửa hàng</strong>

                            <p class="text-muted">
                                {{ $data->store ? $data->store->name : '' }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                            <p class="text-muted">{{ $data->store ? $data->store->address : '' }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Cập nhập trạng thái</strong>

                            <p class="text-muted">
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <input id="status" hidden type="text" value="{{ $data->status }}" />
                                        <input id="exper-id" hidden type="text" value="{{ $data->id }}" />
                                        @if ($data->status == 2)
                                            <button class="btn btn-info update-status">
                                                Mở Khóa
                                            </button>
                                        @elseif ($data->status == 1)
                                            <button class="btn btn-danger update-status">
                                                Khóa
                                            </button>
                                        @else
                                            <button class="btn btn-warning update-status">
                                                Kích Hoạt
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <a type="button" href="/admin/users" class="btn btn-default f-right">
                                            Hủy
                                        </a>
                                    </div>
                                </div>
                                
                            </p>

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
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Tài liệu
                                        đính kèm</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="fw-bold">
                                                <a href="#">Ảnh CCCD</a>
                                            </span>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <a href="{{ $data->cccdmt ? json_decode($data->cccdmt)[0] : '/assets/admin/dist/images/cccdmt.jpg' }}" target="_blank" >
                                                        <img id="imgcccdmt"
                                                        src="{{ $data->cccdmt ? json_decode($data->cccdmt)[0] : '/assets/admin/dist/images/cccdmt.jpg' }}"
                                                        class="cmnd img-fluid mb-3" alt="">
                                                    </a>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ảnh CCCD mặt trước</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <a href="{{ $data->cccdms ? json_decode($data->cccdms)[0] : '/assets/admin/dist/images/cccdms.jpg' }}" target="_blank" >
                                                        <img id="imgcccdms"
                                                        src="{{ $data->cccdms ? json_decode($data->cccdms)[0] : '/assets/admin/dist/images/cccdms.jpg' }}"
                                                        class="cmnd img-fluid mb-3" alt="">
                                                    </a>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label>Ảnh CCCD mặt sau</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <span class="fw-bold">
                                                <a href="#">Giấy Chứng Nhận</a>
                                            </span>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <a href="{{ ($data->store && $data->store->certificate1) ? json_decode($data->store->certificate1)[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}"
                                                        target="_blank">
                                                        <img src="{{ ($data->store && $data->store->certificate1) ? json_decode($data->store->certificate1)[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}"
                                                            class="cmnd img-fluid mb-3" alt="">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <a href="{{ ($data->store && $data->store->certificate2) ? json_decode($data->store->certificate2)[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}"
                                                        target="_blank">
                                                        <img src="{{ ($data->store && $data->store->certificate2) ? json_decode($data->store->certificate2)[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}"
                                                            class="cmnd img-fluid mb-3" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="fw-bold">
                                                <a href="#">Ảnh Cửa Hàng</a>
                                            </span>
                                        </div>
                                        <div class="row mb-3">
                                            @if ($data->store)
                                                @foreach (json_decode($data->store->photo) as $el)
                                                    <div class="col-sm-3">
                                                        <a href="{{ $el }}" target="_blank">
                                                            <img class="img-fluid mb-3" src="{{ $el }}"
                                                                alt="Photo">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
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
        $('.update-status').click(function() {
            var id = $('#exper-id').val();
            var status = $('#status').val();
            
            let newStatus = null;
            // đang hoạt động, update thành khóa
            if(status == 1) {
                newStatus = 2;
            } else { // chưa kích hoạt và khóa update thành hoạt động
                newStatus = 1;
            }

            $.ajax({
                type: "PUT",
                url: "/admin/users/" + id,
                data: {'status': newStatus},
                success: function(data) {
                    // Ajax call completed successfully
                    alert("Cập nhập thành công!");
                    location.reload();
                },
                error: function(data) {
                    // Some error in ajax call
                    alert("Lỗi rồi bạn ơi...!");
                }
            });
        });
    })
</script>

@endsection
