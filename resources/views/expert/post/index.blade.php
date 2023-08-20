@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-12 col-lg-6 col-xl-4 pd-16">
                    <div class="card mb-2 bg-gradient-dark">
                        <a href="/expert/posts/{{ $item->id }}" class="text-white">
                            <img class="card-img-top" src="{{ $item->image ? $item->image[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}" alt="Dist Photo 1">
                        </a>
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-primary text-white">{{ $item->title }}</h5>
                            <p class="card-text text-white pb-2 pt-1 more-post">{{ $item->description }}</p>
                            <a href="/expert/posts/{{ $item->id }}" type="button" class="btn btn-info btn-xs">Xem thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('linkscript')
    <script>
        $(function() {

        });
    </script>
@endsection
