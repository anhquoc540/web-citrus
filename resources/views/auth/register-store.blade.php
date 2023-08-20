<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="hold-transition">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="pd-40">


            <div class="row ">
                <p class="ttcn">Thông tin cửa hàng kinh doanh</p>
            </div>
            <form action="/register-store" method="POST" enctype=multipart/form-data>
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-8 mr-auto">
                        <div class="form-group">
                            <label for="name">Tên cửa hàng</label>
                            <input class="form-control" name="name" id="name"
                                placeholder="Vui lòng nhập tên của hàng" required >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input class="form-control" name="address" id="address"
                                placeholder="Vui lòng nhập địa chỉ" required >
                        </div>
                        <div class="form-group dflex">
                            <div class="col-lg-4">
                                <label><b>Vĩ độ</b> </label>
                                <input class="form-control" type="text" name="latitude" id="lat" />
                            </div>
                            <div class="col-lg-4">
                                <label><b>Kinh độ</b> </label>
                                <input class="form-control" type="text" name="longitude" id="long" />
                            </div>
                        </div>

                        <div class="dflex mt-48">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Giấy chứng nhận đủ điều kiện buôn bán thuốc trừ sâu, phân bón</label>
                                    <input type="file" class="form-control w350" name="certificate1[]" multiple
                                        id="certificate1" required />
                                </div>
                                <img id="imgcertificate1" src="/assets/admin/dist/images/default-thumbnail.jpg"
                                    class="cmnd" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Giấy chứng nhận đăng kí kinh doanh</label>
                                    <input type="file" class="form-control w350" id="certificate2" multiple
                                        name="certificate2[]" required />
                                </div>
                                <img id="imgcertificate2" src="/assets/admin/dist/images/default-thumbnail.jpg"
                                    class="cmnd" alt="">
                            </div>
                        </div>

                        <div class="form-group mt-48">
                            <label>Hình ảnh cửa hàng/ Kho bãi đang kinh doanh</label>
                            <input type="file" class="form-control w350" id="storephoto" multiple
                                        name="storephoto[]" required />
                        </div>

                        <input type="text" name="user_id" value="{{ $userId }}" hidden />

                        <div id="img-stores"></div>

                        <div class="card-footer mt-48">
                            <a type="button" href="/" class="btn btn-secondary">Hủy</a>
                            <button type="submit" class="btn btn-info f-right">Tạo</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>

    </div><!-- /.container-fluid -->

</body>

@include('admin.linkscript')

</html>

<script>
    // list image
    $(function() {
        $("#storephoto").change(function() {
            $('#img-stores').empty();
            if (this.files && this.files[0]) {
                for (var i = 0; i < this.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[i]);
                }
            }
        });
    });

    function imageIsLoaded(e) {
        $('#img-stores').append('<img src=' + e.target.result + '>');
    };

    // imgage chung chi
    $("#certificate1").on("change", function() {
        let file = $(this).prop("files")[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#imgcertificate1").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $("#certificate2").on("change", function() {
        let file = $(this).prop("files")[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#imgcertificate2").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

</script>


{{-- get lat long api --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7-Xjm2TJi4-2FKwDLna2xIs4Nt5uD768&libraries=places">
</script>
<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            // document.getElementById('city2').value = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('long').value = place.geometry.location.lng();
        });


    }
    google.maps.event.addDomListener(window, 'load', initialize);

    // set lat long is null
    $("#address").on("input", function() {
        let text = $(this).val();
        if (text.length == 0) {
            $("#lat").val("");
            $("#long").val("");
        }
    });
</script>
