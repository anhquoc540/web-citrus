@extends('admin.main')

@section('content')
<table id="therapies" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>STT .</th>
                <th>Tên Bệnh</th>
                <th>Tên Hoạt Chất</th>
                <th>Mô Tả</th>
                <th>Chất Hóa Học</th>
                <th>Ngày Tạo</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $key => $value)
                <tr>
                    <td> {{ ++$key }} </td>
                    <td> {{ $value->disease ? $value->disease->name : '...'}} </td>
                    <td> {{ $value->name }} </td>
                    <td> {{ $value->description }} </td>
                    <td> {{ $value->is_chemical ? 'Có' : 'Không' }} </td>
                    <td> {{ $value->created_at ? $value->created_at->format('Y-m-d') : '' }} </td>
                    <td>
                        <a class="btn btn-primary btn-sm f-left" href="/admin/therapies/edit/{{ $value->id }}"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger btn-sm f-right" href="#" onclick="deleteTherapy({{ $value->id }})"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('linkscript')

<script>
    $(function () {
      $('#therapies').DataTable({
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
    });
  </script>

@endsection


