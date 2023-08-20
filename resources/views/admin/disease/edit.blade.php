@extends('admin.main')

@section('content')
    <div class="col-sm-6 mr-auto">
        <form action="/admin/diseases/edit/{{ $disease->id }}" method="POST" enctype= multipart/form-data>
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Tên Bệnh</label>
                            <input class="form-control" value="{{ $disease->name }}" name="name" id="name" placeholder="Vui lòng nhập tên bệnh">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="characteristic">Triệu Chứng</label>
                    <textarea rows="6" class="form-control" name="characteristic" id="characteristic" placeholder="Characteristic">{{ $disease->characteristic }}</textarea>
                </div>
                <div class="form-group">
                    <label for="reason">Nguyên Nhân Gây Bệnh</label>
                    <textarea rows="6" class="form-control" name="reason" id="reason" placeholder="Reason">{{ $disease->reason }}</textarea>
                </div>

                <!-- Post -->
                <div class="form-group">
                    <label>Tải Ảnh Bệnh</label>
                    <input type="file" class="form-control" name="photos[]" multiple />
                    <div class="row mb-3 mg-top-24">
                        @if (json_decode($disease->photo))
                            @foreach (json_decode($disease->photo) as $el)
                                <div class="col-sm-3">
                                    <img class="img-fluid mb-3" src="{{ $el }}" alt="Photo">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.post -->
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a type="button" href="/admin/diseases/list" class="btn btn-secondary">Hủy</a>
                <button type="submit" class="btn btn-info f-right">Cập Nhập</button>
            </div>
        </form>
    </div>
@endsection

@section('linkscript')
<script src="/ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
