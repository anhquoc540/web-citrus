<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="hold-transition">
    
    <!-- /.login-box -->

    {{-- <section class="content">
        <div class="container-fluid"> --}}
            <div class="row height-100vh mg-left-0 mg-right-0">
                <section class="col-lg-7 pd-left-0 pd-right-0">
                    <div class="login-page login-left text-white">
                        <h2 class=""><b>Citrus</b></h2>
                        <p>Giải pháp thông minh hỗ trợ nông nghiệp</p>
                        <button class="btn btn-info btn-block btn-xemthem br-24">Xem thêm</button>
                    </div>
                </section>
                <section class="col-lg-5 pd-left-0 pd-right-0">
                    <div class="login-page">
                        <div class="login-box">
                            <div class="login-logo">
                                <a href="#" class="fw-bold">Citrus</a>
                            </div>
                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body">
                                    <p class="login-box-msg">Đăng nhập để bắt đầu</p>
                                    @include('admin.alert')
                                    <form action="/login" method="post">
                                        <div class="input-group mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Tài khoản">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="icheck-primary">
                                                    <input type="checkbox" name="remember" id="remember">
                                                    <label for="remember">
                                                        Lưu mật khẩu
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-5">
                                                <button type="submit" class="btn btn-info btn-block br-24">Đăng Nhập</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
    
                                        <p class="mb-1">
                                            <a class="text-info" href="#">Quên Mật Khẩu</a>
                                          </p>
                                          <p class="mb-0">
                                            <a href="/register" class="text-center text-info">Đăng Ký Tạo Cửa Hàng</a>
                                          </p>
                                        {{-- <div class="row">
                                            <div class="col-6">
                                                <a href="#" >Forgot password</a>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-6">
                                                <a href="#" class="float-right">Register</a>
                                            </div>
                                            <!-- /.col -->
                                        </div> --}}
                                        @csrf
                                    </form>
                                </div>
                                <!-- /.login-card-body -->
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>
        {{-- </div>
    </section> --}}

    @include('admin.linkscript')
</body>

</html>
