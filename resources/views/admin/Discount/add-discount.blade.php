@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thêm ưu đãi</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('post-add-discount') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tên Ưu đãi</label>
                            <input class="form-control" name=" description" type="text">
                        </div>
                        <div class="col-md-4">
                            <label for="percent">Phần trăm ưu đãi</label>
                            <select class="select2 form-control" name=" percent" id="percent">
                                <option></option>
                                <option value="0">0</option>
                                <option value="5">5</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Thời gian ưu đãi:</label>
                            <input class="form-control" name=" time" type="text">
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
