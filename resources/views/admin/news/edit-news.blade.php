@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Sửa bài viết</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('post-edit-new',$new->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Tên tiêu đề:</label>
                    <input class="form-control" id="title" name=" title" type="text" value="{{ $new ->title }}">
                </div>
                <div class="form-group">
                    <label for="ckeditor1" class="control-label">Mô tả Ngắn</label>
                    <textarea style="resize: none" name="summary" class="form-control" id="ckeditor1" rows="8">{!! $new->summary !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="ckeditor" class="control-label">Nội dung</label>
                    <textarea style="resize: none" name="content_news" class="form-control" id="ckeditor" rows="8">{!! $new->content_news !!}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="img">Ảnh bài viết:</label>
                    <input type="file" name="img" id="img" class="dropify" data-height="300" data-default-file="{{ asset($new->img) }}">
                </div>
                <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
