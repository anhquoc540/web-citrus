<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="hold-transition">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row pd-40">
            <p class="ttcn">Thông tin cá nhân</p>
            <div class="col-lg-8 col-8 mr-auto">
                <div class="col-lg-6 mr-auto">
                    <p>
                        Thông tin cá nhân
                        Vui lòng chụp ảnh chân dung và hai mặt của CCCD
                        để xác thực tài khoản của bạn. Mọi thông tin bạn cung
                        cấp sẽ được bảo mật tuyệt đối.
                    </p>
                    <p>*Lưu ý: Không sử dụng CMND</p>
                    <img src="/assets/admin/dist/images/cmnd.jpg" class="cmnd" alt="">
                </div>

            </div>
            <form action="register-info" method="POST" style="width: 100%" enctype= multipart/form-data>
                <div class="col-lg-8 col-8 mr-auto dflex pd-40">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tải ảnh CCCD mặt trước</label>
                            <input type="file" class="form-control" name="cccdmt[]" multiple id="cccdmt" required />
                        </div>
                        <img id="imgcccdmt" src="/assets/admin/dist/images/cccdmt.jpg" class="cmnd" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tải ảnh CCCD mặt sau</label>
                            <input type="file" class="form-control" id="cccdms" multiple name="cccdms[]" required />
                        </div>
                        <img id="imgcccdms" src="/assets/admin/dist/images/cccdms.jpg" class="cmnd" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-8 mr-auto">
                    <div class="card-footer">
                        <a type="button" href="/register" class="btn btn-secondary">Hủy</a>
                        <button type="submit" class="btn btn-info f-right">Tiếp theo</button>
                    </div>
                </div>
                <input type="text" name="user_id" value="{{ $userId }}" hidden />
                @csrf
            </form>
        </div>

    </div><!-- /.container-fluid -->

</body>

@include('admin.linkscript')

</html>

<script>
    $(function() {
        $("#cccdmt").on("change", function() {
            let file = $(this).prop("files")[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#imgcccdmt").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $("#cccdms").on("change", function() {
            let file = $(this).prop("files")[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#imgcccdms").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
    
</script>
