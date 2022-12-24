@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chỉnh sửa sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('products-edit-post',$sp->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="cate">Loại sản phẩm</label>
                            <select id="cate" class="select2 form-control" name="cate_id">
                                <option>Chọn loại sản phẩm</option>
                                @foreach($cate as $cate_sp)
                                    <option {{ ($sp->category->id) == ($cate_sp->id) ? ' selected' : '' }} value="{{ $cate_sp->id }}">{{ $cate_sp->cate_tittle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="name">Tên sản phẩm:</label>
                            <input class="form-control" id="name" name=" name" type="text" value="{{ $sp->name }}">
                        </div>
                        <div class="col-md-4">
                            <label for="price">Giá sản phẩm:</label>
                            <input class="form-control" id="price" name=" price" type="number" value="{{ $sp->price }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="quantity">Số lượng sản phẩm:</label>
                            <input class="form-control" id="quantity" name=" quantity" type="number" value="{{ $sp->quantity }}">
                        </div>
                        <div class="col-md-6">
                            <label for="discount_id">Ưu đãi:</label>
                            <select id="discount_id" class="select2 form-control" name="discount_id">
                                <option>Chọn Ưu đãi</option>
                                @foreach($discount as $sale_sp)
                                    <option {{ ($sp->discount->id) == ($sale_sp->id) ? ' selected' : '' }} value="{{ $sale_sp->id }}">{{ $sale_sp->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ckeditor" class="control-label">Mô tả sản phẩm</label>
                    <textarea style="resize: none" name="description" class="form-control" id="ckeditor" rows="8">
                        {!! $sp->description !!}
                    </textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="img">Ảnh Sản phẩm:</label>
                    <input type="file" name="img" id="img" class="dropify" data-height="300" data-default-file="{{ asset($sp->img) }}">
                </div>
                <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
                <a href="{{ route('list-produc') }}" class="btn btn-danger btn" role="button"
                   aria-pressed="true">Hủy</a>
            </form>
        </div>
    </div>
@endsection
