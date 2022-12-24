@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chỉnh sửa loại hàng</h4>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('post-edit-cate',$cate->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="cate_tittle">Tên loại hàng:</label>
                    <input class="form-control" id="cate_tittle" name="cate_tittle" type="text" value="{{ $cate->cate_tittle }}">
                </div>
                <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
                <a href="{{ route('list-cate') }}" class="btn btn-danger btn" role="button"
                   aria-pressed="true">Hủy</a>
            </form>
        </div>
    </div>
@endsection
