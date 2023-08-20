@extends('admin.main')

@section('content')
    <button id="btn-add-stpr" type="button" class="btn btn-info btn-add" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"
            aria-hidden="true"></i> Thêm Thuốc</button>
    <table id="products-store" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT .</th>
                <th>Tên Thuốc</th>
                <th>Nhà Sản Xuất</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Trạng Thái</th>
                <th>Ngày Sản Xuất</th>
                <th>Ngày Hết Hạn</th>
                <th style="width: 60px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $value)
                <tr>
                    <td> {{ ++$key }} </td>
                    <td> {{ $value->name }} </td>
                    <td> {{ $value->manufacturer }} </td>
                    <td> {{ $value->price }} </td>
                    <td> {{ $value->qty }} </td>
                    <td> {{ $value->status ? 'Hiện' : 'Ẩn' }} </td>
                    <td> {{ $value->date_of_manufacture }} </td>
                    <td> {{ $value->date_of_expiry }} </td>
                    <td>
                        <a class="btn btn-primary btn-sm f-left" data-toggle="modal" data-target="#modal-lg-edit" onclick="editProductStore({{ $value->id }})"><i
                                class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm f-right" href="#"
                            onclick="deleteProductStore({{ $value->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- model add --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm thuốc mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formId' action=''>
                        @csrf
                        <div class="card-body">
                
                            <div class="form-group">
                                <label for="product_id">Tên thuốc</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    
                                </select>
                            </div>
                
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input class="form-control" name="price" id="price" placeholder="Vui lòng nhập giá">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="qty">Số lượng</label>
                                        <input class="form-control" name="qty" id="qty" placeholder="Vui lòng nhập số lượng">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_of_manufacture">Ngày sản xuất</label>
                                        <div class="input-group date" id="date_of_manufacture" data-target-input="nearest">
                                            <input type="text" name="date_of_manufacture" class="form-control datetimepicker-input" data-target="#date_of_manufacture"/>
                                            <div class="input-group-append" data-target="#date_of_manufacture" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_of_expiry">Ngày hết hạn</label>
                                        <div class="input-group date" id="date_of_expiry" data-target-input="nearest">
                                            <input type="text" name="date_of_expiry" class="form-control datetimepicker-input" data-target="#date_of_expiry"/>
                                            <div class="input-group-append" data-target="#date_of_expiry" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="submitButton" class="btn btn-primary">Lưu</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- model edit --}}
    <div class="modal fade" id="modal-lg-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa thông tin thuốc</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formEdit' action=''>
                        @csrf
                        <div class="card-body">
                
                            <div class="form-group">
                                <label for="product_id">Tên thuốc</label>
                                <input class="form-control" readonly name="product" id="product_name">
                            </div>
                
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Giá</label>
                                        <input class="form-control" name="price" id="price_edit" placeholder="Vui lòng nhập giá">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="qty">Số lượng</label>
                                        <input class="form-control" name="qty" id="qty_edit" placeholder="Vui lòng nhập số lượng">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_of_manufacture_edit">Ngày sản xuất</label>
                                        <div class="input-group date" id="date_of_manufacture_edit" data-target-input="nearest">
                                            <input id="date_of_manufacture-edit" type="text" name="date_of_manufacture" class="form-control datetimepicker-input" data-target="#date_of_manufacture_edit"/>
                                            <div class="input-group-append" data-target="#date_of_manufacture_edit" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_of_expiry_edit">Ngày hết hạn</label>
                                        <div class="input-group date" id="date_of_expiry_edit" data-target-input="nearest">
                                            <input id="date_of_expiry-edit" type="text" name="date_of_expiry" class="form-control datetimepicker-input" data-target="#date_of_expiry_edit"/>
                                            <div class="input-group-append" data-target="#date_of_expiry_edit" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input hidden name="price_id" id="price_id" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="submitButtonEdit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('linkscript')
    <script>
        $(function() {
            $('#products-store').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "columnDefs": [{
                    "targets": [6], // column index (start from 0)
                    "orderable": false, // set orderable false for selected columns
                }]
            });

            // call get product not have in store
            $("#btn-add-stpr").click(function(){
                $.ajax({
                    type: "GET",
                    datatype: "JSON",
                    data: {  },
                    url: "/expert/stores/import-product",
                    success: function (result) {
                        if (result.error == false) {
                            $('#product_id')
                                .find('option')
                                .remove()
                                .end()
                                .append('<option value="0">Vui lòng chọn một loại thuốc</option>')
                                .val('0')
                            ;

                            // console.log(result);

                            // set option for selected product
                            result.data.forEach(element => {
                                $('#product_id').append(`<option value="${element.id}">
                                       ${element.name}
                                  </option>`);
                            });
                        } else {
                            alert("Error, please try again");
                        }
                    },
                });
            });

            // submit form
            $("#submitButton").click(function(ev) {
                var form = $("#formId");
                $.ajax({
                    type: "POST",
                    url: "/expert/stores/import-product",
                    data: form.serialize(),
                    success: function(data) {
                        // Ajax call completed successfully
                        alert("Thêm thuốc thành công!");
                        location.reload();
                    },
                    error: function(data) {
                        // Some error in ajax call
                        alert("Lỗi rồi bạn ơi...!");
                    }
                });
            });

            // submit form update
            $("#submitButtonEdit").click(function(ev) {
                var form = $("#formEdit");
                $.ajax({
                    type: "PUT",
                    url: "/expert/stores/update",
                    data: form.serialize(),
                    success: function(data) {
                        // Ajax call completed successfully
                        alert("Sửa thông tin thuốc thành công!");
                        location.reload();
                    },
                    error: function(data) {
                        console.log(data);
                        // Some error in ajax call
                        alert("some Error");
                    }
                });
            });

            //Date picker
            $('#date_of_manufacture').datetimepicker({
                format: 'L'
            });

            $('#date_of_expiry').datetimepicker({
                format: 'L'
            });

            $('#date_of_manufacture_edit').datetimepicker({
                format: 'L'
            });

            $('#date_of_expiry_edit').datetimepicker({
                format: 'L'
            });

        });

        // get model update
        function editProductStore(id) {
            $.ajax({
                    type: "GET",
                    datatype: "JSON",
                    data: { id },
                    url: "/expert/stores/update",
                    success: function (result) {
                        if (result.error == false) {
                            
                            $("#product_name").val(result.data.name);
                            $("#price_edit").val(result.data.price);
                            $("#qty_edit").val(result.data.qty);
                            $("#price_id").val(result.data.id);
                            $("#date_of_manufacture-edit").val(result.data.date_of_manufacture);
                            $("#date_of_expiry-edit").val(result.data.date_of_expiry);
                            
                        } else {
                            alert("Error, please try again");
                        }
                    },
                });
        }

        

    </script>
@endsection
