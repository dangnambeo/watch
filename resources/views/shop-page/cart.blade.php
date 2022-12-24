@if(Session::has("Cart") != null)
    @foreach(Session::get("Cart")->products as $list)
        <div class="card-sp">
            <div class="row" style="width: 100%; margin: 0">
                <img src="{{ asset($list['productInfo']->img) }}" class="col-md-3"  alt="">
                <div class="main-cart col-md-7">
                    <h6>{{ $list['productInfo']->name }} <span>x {{ $list['quanty'] }}</span></h6>
                    <span class="price-item-cart">{{ number_format($list['productInfo']->price) }} đ</span>
                </div>
                <div class="del-cart-item col-md-2">
                    <span data-id="{{ $list['productInfo']->id }}"><i class="fa-solid fa-trash-can"></i></span>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
    <h5>Tổng tiền: <span>{{ number_format(Session::get("Cart")->totalPrice) }} đ</span></h5>
    <input id="total-quanty-cart" hidden type="number" value="{{ Session::get("Cart")->totalQuanty }}">
@endif
