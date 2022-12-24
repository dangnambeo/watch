@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                @if(($bill->user_id)!=null)
                    <div class="page-title-right">
                        <h6>Nhân viên phụ trách:
                            <span style="color: #e17055; font-style: italic">{{ $bill->user->full_name }}</span>
                        </h6>
                    </div>
                @endif
                <h4 class="page-title">Đơn hàng chi tiết </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="card mb-4">
        <div class="card-body" style="margin: 20px">
            <form action="{{ route('edit-bill',$bill->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="customer_name">Tên khách hàng:</label>
                            <input class="form-control" id="customer_name" name=" customer_name" type="text" value="{{ $bill->customer-> customer_name}}" >
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Số điện thoại:</label>
                            <input class="form-control" id="phone" name=" phone" type="text" value="{{ $bill->customer-> phone }}">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Địa chỉ mail:</label>
                            <input class="form-control" id="email" name=" email" type="email" value="{{ $bill->customer-> email }}" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="address">Địa chỉ giao hàng:</label>
                            <textarea name="address" class="form-control" id="address" cols="30" rows="2">{{ $bill->customer->address }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="status">Trạng thái đơn hàng:</label>
                            <select id="status" class="select2 form-control" name="status">
                                <option {{ $bill->status == 0 ? ' selected' : '' }} value="0" selected>Chưa xác nhận</option>
                                <option {{ $bill->status == 1 ? ' selected' : '' }} value="1">Xác nhận đơn hàng</option>
                                <option {{ $bill->status == 2 ? ' selected' : '' }} value="2">Giao hàng thành công</option>
                                <option {{ $bill->status == 3 ? ' selected' : '' }} value="3">Hủy đơn hàng</option>
                            </select>
                        </div>
                        <div class="col-md-3" hidden>
                            <label for="user_id">Nhân viên phụ trách:</label>
                            <input name="user_id" class="form-control" id="user_id" type="text" value="{{ Auth::user()->id }}"
                                @if(($bill->user_id)!=null)
                                    disabled
                                @endif>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-bordered m-0 m-0 table-colored-bordered table-bordered-purple">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th style="text-align: center">Giá tiền</th>
                                <th style="text-align: center">Số lượng</th>
                                <th style="text-align: center">Ưu đãi</th>
                                <th style="text-align: center">Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($order as $list)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td style="font-weight: bold">{{ $list->name_sp }}</td>
                                    <td style="text-align: center">{{ number_format($list ->price_sp) }} đ</td>
                                    <td style="text-align: center">{{ $list->sl }}</td>
                                    <td style="text-align: center">
                                        @if(($list->sale)!=0)
                                            {{ $list->sale }} %
                                        @endif
                                    </td>
                                    <td style="text-align: center">{{ number_format((($list->price_sp)-(($list->price_sp)*(($list->sale)/100)))*($list->sl)) }} đ</td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th style="text-align: center" colspan="4">Tổng tiền:</th>
                                <th style="text-align: center" colspan="2">{{ number_format($bill->total) }} đ</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="hidden-print">
                    <div class="float-right d-print-none">
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                        <button type="submit" value="Save" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
