@extends('shop-page.layout.master')
@extends('shop-page.layout.header')
@section('section')
    <div class="section">
        <div class="products-item">
            <h2 class="heading">Giao hàng</h2>
        </div>
    </div>
    <div class="section">
        <form action="{{ route('order-post') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="info-custormer">
                        <h4>Thông tin giao hàng</h4>
                        <hr>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Họ tên</label>
                            <input name="customer_name" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" id="exampleFormControlInput1" name="email" placeholder="Email nhận thông báo gửi mail" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ giao hàng</label>
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="order">
                        <h4>Đơn hàng</h4>
                        <hr>
                        @if(Session::has("Cart") != null)
                            @foreach(Session::get("Cart")->products as $list)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="img-cart-item col-md-4">
                                            <img src="{{ asset($list['productInfo']->img) }}" width="100%" alt="">
                                        </div>
                                        <div class="name-cart-item col-md-5">
                                            <h5>
                                                @if(($list['quanty']) > 1)
                                                    <span>{{ $list['quanty'] }} x </span>
                                                @endif
                                                {{ $list['productInfo']->name }}
                                            </h5>
                                        </div>
                                        <div class="price-cart-item col-md-3">
                                            @if(($list['productInfo']->discount ->percent)== 0)
                                                <div class="new-price-cart-item">{{ number_format($list['productInfo']->price) }} đ</div>
                                            @else
                                                <div class="old-price-cart-item">{{ number_format($list['productInfo']->price) }} đ</div>
                                                <div class="new-price-cart-item">{{ number_format(($list['productInfo'] ->price)-(($list['productInfo']->price)*($list['productInfo']->discount ->percent)/100)) }} đ</div>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                            <div class="total-order">
                                <p>
                                    <span>Thành tiền</span>
                                    <span class="red-text">{{ number_format(Session::get("Cart")->totalPrice) }}  đ</span>
                                </p>
                                <input name="status" type="text" value="0" hidden>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-8" style="text-align: end">
                    <button type="submit" class="btn btn-primary" style="width: 50%; font-weight: bold">Đặt hàng</button>
                </div>
            </div>
        </form>
    </div>
@endsection
