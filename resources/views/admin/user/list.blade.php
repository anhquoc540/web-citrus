@extends('admin.main')

@section('content')
<table id="list-users" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Và Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Loại</th>
                <th>Trạng Thái</th>
                <th>Ngày Đămg Ký</th>
                <th style="width: 80px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        {{ $item->phone }}</div>
                    </td>
                    @if ($item->role_id == 1)
                        <td class="text-center"><span class="badge badge-primary">Quản Trị Viên</span></td>
                    @elseif($item->role_id == 2)
                        <td class="text-center"><span class="badge badge-info">Chuyên Gia</span></td>
                    @elseif($item->role_id == 3)
                        <td class="text-center"><span class="badge badge-secondary">Nông Dân</span></td>
                    @endif
                    @if ($item->status == 1)
                        <td class="text-center"><span class="badge badge-success">Hoạt Động</span></td>
                    @elseif($item->status == 0)
                        <td class="text-center"><span class="badge badge-warning">Chưa Kích Hoạt</span></td>
                    @elseif($item->status == 2)
                        <td class="text-center"><span class="badge badge-danger">Khóa</span></td>
                    @endif
                    <td>{{ $item->created_at ? $item->created_at->format('Y-m-d') : '' }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm f-left" href="/admin/users/{{ $item->id }}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm f-right" href="#" onclick="deleteUser({{ $item->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

@endsection

@section('linkscript')

<script>
    $(function () {
      $('#list-users').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columnDefs": [{
            "targets": [7], // column index (start from 0)
            "orderable": false, // set orderable false for selected columns
        }]
      });
    });
  </script>

@endsection


