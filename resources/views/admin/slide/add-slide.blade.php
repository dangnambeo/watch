@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thêm sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('post-add-slide') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Tên sản phẩm:</label>
                    <input class="form-control" id="title" name=" title" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="img_slide">Ảnh Sản phẩm:</label>
                    <input type="file" name="img_slide" id="img_slide" class="dropify" data-height="300">
                </div>
                <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
