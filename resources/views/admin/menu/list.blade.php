@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>CONTENT</th>
                <th>ACTIVE</th>
                <th>DATE UPDATE</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($list) !!}
        </tbody>
        
    </table>
@endsection


