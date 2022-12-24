@extends('admin.layout.master')
@extends('admin.layout.header')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thêm nhân nhiên</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
        <div class="card mb-4">
            <div class="card-body" style="margin: 20px">
                <form action="{{ route('postAdd-user') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                               <label>Tên Đầy Đủ</label>
                               <input class="form-control" name=" full_name" type="text">
                           </div>
                           <div class="col-md-4">
                               <label>Số điện thoại:</label>
                               <input class="form-control" name=" phone" type="text">
                           </div>
                           <div class="col-md-4">
                               <label>Địa chỉ mail:</label>
                               <input class="form-control" name=" email" type="text">
                           </div>
                       </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-10">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Tạo Tên Đăng Nhập</label>
                                      <input class="form-control" name="user_name" type="text">
                                  </div>
                                  <div class="col-md-6">
                                      <label>Cấp Quản Lý</label>
                                      <select class="select2 form-control" name=" role_id">
                                          <option>Chọn quyền quản lý</option>
                                          <option value="0">Quản trị viên</option>
                                          <option value="1">Nhân viên</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Tạo Mật Khẩu</label>
                                      <input class="form-control" name="password" type="password">
                                  </div>
                                  <div class="col-md-6">
                                      <label>Nhập Lại Mật Khẩu</label>
                                      <input class="form-control" name="password2" type="password">
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <label class="control-label" for="avatar">Ảnh đại diện:</label>
                              <input type="file" name="avatar" id="avatar" class="dropify">
                          </div>
                      </div>
                    </div>
                    <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
@endsection
