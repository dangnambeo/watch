@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chỉnh sửa ưu đãi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('post-edit-discount',$sale->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tên Ưu đãi</label>
                            <input class="form-control" name=" description" type="text" value="{{ $sale->description }}">
                        </div>
                        <div class="col-md-4">
                            <label for="percent">Phần trăm ưu đãi</label>
                            <select class="select2 form-control" name=" percent" id="percent">
                                <option></option>
                                <option {{ $sale->percent == 0 ? ' selected' : '' }} value="0">0</option>
                                <option {{ $sale->percent == 5 ? ' selected' : '' }} value="5">5</option>
                                <option {{ $sale->percent == 15 ? ' selected' : '' }} value="15">15</option>
                                <option {{ $sale->percent == 20 ? ' selected' : '' }} value="20">20</option>
                                <option {{ $sale->percent == 30 ? ' selected' : '' }} value="30">30</option>
                                <option {{ $sale->percent == 50 ? ' selected' : '' }} value="50">50</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="time">Thời gian ưu đãi:</label>
                            <input class="form-control" id="time" name=" time" type="text" value="{{ $sale->time }}">
                        </div>
                    </div>
                </div>
                <div class="form-group text-right mb-0">
                    <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
