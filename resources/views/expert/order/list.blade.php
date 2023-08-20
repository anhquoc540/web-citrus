@extends('admin.main')

@section('content')
    <table id="orders" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Tên Đơn Hàng</th>
                <th>Trạng Thái</th>
                <th>Thanh Toán</th>
                <th>Địa Chỉ</th>
                <th>Ngày Tạo</th>
                <th style="width: 116px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td><a href="#">{{ $item->order_code }}</a></td>
                    <td>{{ $item->description }}</td>
                    @if ($item->status == 1)
                        <td><span class="badge badge-warning">Đang Xử Lý</span></td>
                    @elseif($item->status == 2)
                        <td><span class="badge badge-info">Vận Chuyển</span></td>
                    @elseif($item->status == 3)
                        <td><span class="badge badge-success">Đã Giao Hàng</span></td>
                    @elseif($item->status == 4)
                        <td><span class="badge badge-danger">Đã Hủy</span></td>
                    @endif

                    @if ($item->paid == 1)
                        <td><span class="badge badge-primary">Đã Thanh Toán</span></td>
                    @else
                        <td><span class="badge badge-secondary">Chưa Thanh Toán</span></td>
                    @endif
                    <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $item->address->address }}</div>
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/expert/orders/{{ $item->id }}" ><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm btn-center" data-toggle="modal" data-target="#modal-lg"
                            onclick="editOrder({{ $item->id }})"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm" href="#"
                            onclick="deleteOrder({{ $item->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- model update order --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cập nhập đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='formId' action=''>
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="description">Tên đơn hàng</label>
                                <input class="form-control" name="description" id="description"
                                    placeholder="Vui lòng nhập tên đơn hàng">
                            </div>

                            <div class="row">
                                <label for="status">Trạng thái</label>
                                <select class="form-control" name="status" id="status">

                                </select>
                            </div>
                        </div>
                        <input hidden name="id" id="id" />
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="submitButton" class="btn btn-info">Lưu</button>
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
            $('#orders').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'Create Order',
                        className: 'create-order',
                        action: function ( e, dt, node, config ) {
                            window.location.href = "/expert/orders/add";
                        }
                    }
                ],
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                order: [[5, 'desc']],
                "columnDefs": [{
                    "targets": [6], // column index (start from 0)
                    "orderable": false, // set orderable false for selected columns
                }]
            });

            // submit form
            $("#submitButton").click(function(ev) {
                var form = $("#formId");
                $.ajax({
                    type: "PUT",
                    url: "/expert/orders/update",
                    data: form.serialize(),
                    success: function(data) {
                        // Ajax call completed successfully
                        alert("Cập nhập đơn hàng thành công!");
                        location.reload();
                    },
                    error: function(data) {
                        // Some error in ajax call
                        alert("Lỗi rồi bạn ơi...!");
                    }
                });
            });
        });

        // get model update
        function editOrder(id) {
            $.ajax({
                type: "GET",
                datatype: "JSON",
                data: {
                    id
                },
                url: "/expert/orders/update",
                success: function(result) {
                    if (result.error == false) {
                        console.log(result);
                        $("#description").val(result.data.description);
                        $("#id").val(result.data.id);

                        $('#status')
                            .find('option')
                            .remove()
                            .end()
                            .val('0');

                        // console.log(result);

                        // set option for selected product
                        let listStatus = [{
                                id: 1,
                                name: 'Đang xử lý'
                            },
                            {
                                id: 2,
                                name: 'Đang vận chuyển'
                            },
                            {
                                id: 3,
                                name: 'Đã giao hàng'
                            },
                            {
                                id: 4,
                                name: 'Đã hủy'
                            }
                        ];
                        listStatus.forEach(element => {
                            $('#status').append(`<option ${ element.id == result.data.status ? 'selected' : '' } value="${element.id}">
                                       ${element.name}
                                  </option>`);
                        });

                    } else {
                        alert("Error, please try again");
                    }
                },
            });
        }

        

        
    </script>
@endsection
