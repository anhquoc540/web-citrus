@extends('admin.main')

@section('content')
<table id="products" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>STT .</th>
            <th>Tên Hoạt Chất</th>
            <th>Tên Thuốc</th>
            <th>Hướng Dẫn Sử Dụng</th>
            <th>Công Dụng</th>
            <th>Nhà Sản Xuất</th>
            <th>Số Đăng Ký</th>
            <th>Trạng Thái</th>
            <th>Ngày Tạo</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($list as $key => $value)
            <tr>
                <td> {{ ++$key }} </td>
                <td> {{ $value->therapy ? $value->therapy->name : '...'}} </td>
                <td> {{ $value->name }} </td>
                <td class="more"> {{ $value->instruction }} </td>
                <td class="more"> {{ $value->uses }} </td>
                <td> {{ $value->manufacturer }} </td>
                <td> {{ $value->reg_number }} </td>
                <td> {{ $value->status ? 'Hiện' : 'Ẩn' }} </td>
                <td> {{ $value->created_at ? $value->created_at->format('Y-m-d') : '' }} </td>
                <td>
                    <a class="btn btn-primary btn-sm f-left" href="/admin/products/edit/{{ $value->id }}"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm f-right" href="#" onclick="deleteProduct({{ $value->id }})"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection

@section('linkscript')

<script>
    $(function () {
    //   $("#example2").DataTable({
    //     "responsive": true, "lengthChange": false, "autoWidth": false,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#products').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [{
            "targets": [9], // column index (start from 0)
            "orderable": false, // set orderable false for selected columns
        }]
      });
    });
  </script>

@endsection




