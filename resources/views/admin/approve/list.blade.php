@extends('admin.main')

@section('content')
<table id="approves" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Và Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Tên Cửa Hàng</th>
                <th>Địa Chỉ Cửa Hàng</th>
                <th>Trạng Thái</th>
                <th>Ngày Đămg Ký</th>
                <th style="width: 60px">&nbsp;</th>
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
                    <td>
                        {{ $item->store ? $item->store->name : '' }}</div>
                    </td>
                    <td>
                        {{ $item->store ? $item->store->address : '' }}</div>
                    </td>
                    @if ($item->status == 1)
                        <td><span class="badge badge-success">Đã Kích Hoạt</span></td>
                    @elseif($item->status == 0)
                        <td><span class="badge badge-warning">Chưa Kích Hoạt</span></td>
                    @endif
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm f-left" href="/admin/approves/{{ $item->id }}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm f-right" href="#" onclick="deleteApprove({{ $item->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>

@endsection

@section('linkscript')

<script>
    $(function () {
      $('#approves').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        // "columnDefs": [{
        //     "targets": [6], // column index (start from 0)
        //     "orderable": false, // set orderable false for selected columns
        // }]
      });
    });
  </script>

@endsection


