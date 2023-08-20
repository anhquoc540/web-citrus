@extends('admin.main')

@section('content')
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="col-12">
                        <img src="{{ $data['post']->image ? $data['post']->image[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}"
                            class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @foreach ($data['post']->image as $k => $el)
                            @if ($k == 0)
                                <div class="product-image-thumb active"><img src="{{ $el }}" alt="Product Image">
                                </div>
                            @else
                                <div class="product-image-thumb active"><img src="{{ $el }}" alt="Product Image">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <h3 class="my-3">{{ $data['post']->title }}</h3>
                    <div class="text-justify">
                        {{ $data['post']->description }}
                    </div>

                </div>
                <div class="col-12 col-sm-5 pd-l-40">
                    <h3 class="my-3">Các bài mới nhất</h3>
                    @foreach ($data['relatedPost'] as $v)
                        <div class="attachment-block clearfix">
                            <a href="/expert/posts/{{ $v->id }}"> 
                            <img class="attachment-img" src="{{ $v->image ? $v->image[0] : '/assets/admin/dist/images/default-thumbnail.jpg' }}" alt="Attachment Image">
                            </a>

                            <div class="attachment-pushed">
                                <h4 class="attachment-heading"><a href="/expert/posts/{{ $v->id }}"> {{ $v->title }}</a></h4>

                                <div class="attachment-text more-post">
                                    {{ $v->description }} <a href="/expert/posts/{{ $v->id }}">Thêm</a>
                                </div>
                                <!-- /.attachment-text -->
                            </div>
                            <!-- /.attachment-pushed -->
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Bình luận</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade  show active" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Đợi update api </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('linkscript')
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
@endsection
