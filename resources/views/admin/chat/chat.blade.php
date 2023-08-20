@extends('admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <chat :user="{{ Auth::user() }}"/>
            {{-- <h1>OK</h1>
            <chat /> --}}
        </div>
    </div>
</div>
@endsection