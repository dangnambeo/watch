@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chỉnh sửa nhân nhiên</h4>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('postEdit-staff',$user->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Tên Đầy Đủ</label>
                            <input class="form-control" name=" full_name" type="text" value="{{ $user->full_name }}">
                        </div>
                        <div class="col-md-4">
                            <label>Số điện thoại:</label>
                            <input class="form-control" name=" phone" type="text" value="{{ $user->phone }}">
                        </div>
                        <div class="col-md-4">
                            <label>Địa chỉ mail:</label>
                            <input class="form-control" name=" email" type="text" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tên Đăng Nhập</label>
                                        <input class="form-control" name="user_name" type="text" value="{{ $user->user_name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Cấp Quản Lý</label>
                                        <select class="form-control select2" name=" role_id">
                                            <option {{ $user->role_id == 0 ? ' selected' : '' }} value="0">Quản trị viên</option>
                                            <option {{ $user->role_id == 1 ? ' selected' : '' }} value="1">Nhân viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label" for="avatar">Ảnh đại diện:</label>
                                    <input type="file" name="avatar" id="avatar" class="dropify" data-default-file="{{ asset($user->avatar) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-box">
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox3" type="checkbox" name="checkbox3">
                                    <label for="checkbox3">
                                        Đổi mật khẩu
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label> Mật Khẩu Mới:</label>
                                    <input class="form-control pass" type="password" name="password" placeholder="Nhập mật khẩu mới"
                                           disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu mới:</label>
                                    <input class="form-control pass" type="password" name="password2"
                                           placeholder="Nhập lại mật khẩu mới" disabled="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
                <a href="{{ route('list-user') }}" class="btn btn-danger btn" role="button"
                   aria-pressed="true">Hủy</a>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#checkbox3").change(function() {
                if ($(this).is(":checked")) {
                    $(".pass").removeAttr('disabled');
                } else {
                    $(".pass").attr('disabled', '');
                }
            });
        });
    </script>
@endsection
