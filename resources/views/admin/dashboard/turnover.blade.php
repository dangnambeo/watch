@extends('admin.layout.master')
@extends('admin.layout.header')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Bảng điều khiển</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-primary bg-soft-primary">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i class="mdi mdi-currency-usd float-right font-30 widget-icon rounded-circle avatar-title text-primary"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Doanh thu</p>
                        <h2>
                            <span data-plugin="counterup">{{ number_format($bill->where('status',2)->sum('total')) }}</span>
                            <span>VNĐ</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-warning bg-soft-warning">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i class="mdi mdi-layers font-30 widget-icon rounded-circle avatar-title text-warning"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User This Month">Đơn hàng đã đặt</p>
                        <h2><span data-plugin="counterup">{{ $bill->Count('id') }} </span></h2>

                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-danger bg-soft-danger">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i class="mdi mdi-av-timer font-30 widget-icon rounded-circle avatar-title text-danger"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="Statistics">Đơn hàng trong tháng</p>
                        <h2><span data-plugin="counterup">{{ $bill_month->count('id') }}</span></h2>

                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card widget-box-one border border-success bg-soft-success">
                <div class="card-body">
                    <div class="float-right avatar-lg rounded-circle mt-3">
                        <i class="mdi mdi-account-convert font-30 widget-icon rounded-circle avatar-title text-success"></i>
                    </div>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-weight-bold text-muted" title="User Today">Đơn hàng giao thành công</p>
                        <h2><span data-plugin="counterup">{{ $bill->where('status',2)->Count('id') }}</span></h2>

                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card-box">
                <h4 class="header-title mb-4">Đơn hàng cần xác nhận</h4>

                <table class="table table-centered mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bill->where('status',0) as $submit_bill)
                        <tr>
                            <td>{{ $submit_bill->id }}</td>
                            <td>
                                <h5 class="mt-0 mb-1 font-15">Tổng tiền: {{ number_format($submit_bill->total) }} đ</h5>
                                <p class="font-13 mb-0">Ngày đặt: {{ $submit_bill->created_at->format('d/m/Y h:m') }}</p>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('order-list',$submit_bill->id) }}" class="btn btn-sm btn-bordered-success waves-effect waves-light btn-success">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end col -->
        <div class="col-sm-8">
            <div class="card-box">
                <h4 class="header-title mb-4">Top 5 Sản phẩm bán chạy</h4>
                <div class="table-responsive">
                    <table class="table table-centered m-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sp_bill as $list)
                            <tr>
                                <td>
                                    <a href="{{ route('products-edit',$list->id) }}"> <img class="rounded" alt="" src="{{ asset($list->img) }}" style="width: 100px; height: 66px;"> </a>
                                </td>
                                <td><a href="{{ route('products-edit',$list->id) }}">{{ $list ->name}}</a></td>
                                <td style="text-align: center">{{ ($list ->quantity)-($list->sl_ban) }}</td>
                                <td>{{ number_format($list ->price) }} đ</td>
                                @if((($list ->quantity)-($list->sl_ban))>0)
                                    <td><span class="badge badge-success">Còn hàng</span></td>
                                @else
                                    <td><span class="badge badge-danger">Hết hàng</span></td>
                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
