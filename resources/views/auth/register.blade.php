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
        <section class="col-lg-6 pd-left-0 pd-right-0">
            <div class="login-page login-left text-white">
                <h2 class=""><b>Citrus</b></h2>
                <p>Giải pháp thông minh hỗ trợ nông nghiệp</p>
                <button class="btn btn-info btn-block btn-xemthem br-24">Xem thêm</button>
            </div>
        </section>
        <section class="col-lg-6 pd-left-0 pd-right-0">
            <div class="login-page">
                <div class="login-box">
                    <div class="login-logo">
                        <a href="#" class="fw-bold">Xin Chào</a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">Đăng kí để bắt đầu</p>
                            @include('admin.alert')
                            <form id="registerForm" method="POST" action="/register">
                                <div class="input-group mb-3 form-group">
                                    <input type="text" name="fullname" class="form-control" placeholder="Tên" minlength="2" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3 form-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Địa chỉ email" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required minlength="5">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3 form-group">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Số điện thoại" required minlength="10">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" required>
                                        <label class="custom-control-label" for="exampleCheck1">Tôi đồng ý với chính
                                            sách của <a href="#">Citrus</a>.</label>
                                    </div>
                                </div>

                                <div class="row mg-top-48">
                                    <!-- /.col -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info btn-block br-24">Đăng Ký</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
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

<script>
    // $(document).ready(function() {
    //     $("#registerForm").validate();
    // });

    // $(function() {
    //     $.validator.setDefaults({
    //         submitHandler: function() {
    //             alert("Form successful submitted!");
    //         }
    //     });
    //     $('#registerForm').validate({
    //         rules: {
    //             fullname: {
    //                 required: true,
    //                 minlength: 2,
    //             },
    //             email: {
    //                 required: true,
    //                 email: true,
    //             },
    //             password: {
    //                 required: true,
    //                 minlength: 5
    //             },
    //             retypepassword: {
    //                 required: true,
    //                 minlength: 5
    //             },
    //             phone: {
    //                 required: true,
    //                 minlength: 5
    //             },
    //             address: {
    //                 required: true,
    //                 minlength: 5
    //             },
    //             terms: {
    //                 required: true
    //             },
    //         },
    //         messages: {
    //             fullname: {
    //                 required: "Vui lòng nhập tên",
    //                 minlength: "Tên phải có ít nhất 2 kí tự"
    //             },
    //             email: {
    //                 required: "Vui lòng nhập địa chỉ email",
    //                 email: "Vui lòng nhập địa chỉ email hợp lệ"
    //             },
    //             password: {
    //                 required: "Vui lòng nhập mật khẩu",
    //                 minlength: "Mật khẩu phải có ít nhất 5 kí tự"
    //             },
    //             terms: "Vui lòng chấp nhận điều khoản của chúng tôi"
    //         },
    //         errorElement: 'span',
    //         errorPlacement: function(error, element) {
    //             error.addClass('invalid-feedback');
    //             element.closest('.form-group').append(error);
    //         },
    //         highlight: function(element, errorClass, validClass) {
    //             $(element).addClass('is-invalid');
    //         },
    //         unhighlight: function(element, errorClass, validClass) {
    //             $(element).removeClass('is-invalid');
    //         }
    //     });
    // });
</script>
