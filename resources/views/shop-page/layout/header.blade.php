<header class="header">
    <div class="header-section row">
        <div class="logo col-md-2">
            <img src="{{ asset('image/logo3.png') }}" alt="" width="165px" srcset="" />
        </div>
        <div class="menu col-md-6">
            <div class="navigation">
                <ul class="nav-menu">
                    <li class="menu-item">
                        <a href="{{ route('index') }}" class="item-link">Trang Chủ</a>
                    </li>
                    @foreach($cate as $list)
                        <li class="menu-item">
                            <a href="{{ route('viewpage',$list->id) }}" class="item-link">{{ $list -> cate_tittle }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="search col-md-2">
            <form action="{{ route('producr-search') }}" method="Get">
                <input
                    class="form-control"
                    type="text"
                    placeholder="Tìm kiếm..."
                    aria-label="Search"
                    name="key"
                />
                <button class="search-button fas fa-search" type="submit"></button>
            </form>
        </div>

        <div class="cart col-md-1">
            <a href="{{ route('listCart') }}" class="icon">
                <lord-icon
                        src="https://cdn.lordicon.com/cllunfud.json"
                        trigger="hover"
                        colors="outline:#121331,primary:#646e78,secondary:#ebe6ef"
                        style="width: 60px; height: 60px"
                >
                </lord-icon>
            </a>
            @if(Session::has("Cart") != null)
                <span class="total-quanty" id="total-quanty-show">{{ Session::get("Cart")->totalQuanty }}</span>
            @else
                <span class="total-quanty" id="total-quanty-show">0</span>
            @endif
            <div class="cart-sp">
                <div class="list-cart-sp"  id="change-item-cart">
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
                    @endif
                </div>
                <hr>

            </div>

        </div>
        <div class="login-admin col-md-1">
            <a href="{{ route('login') }}">
                <lord-icon
                    src="https://cdn.lordicon.com/ajkxzzfb.json"
                    trigger="hover"
                    colors="primary:#ffc738,secondary:#4bb3fd"
                    style="width: 60px; height: 60px"
                >
                </lord-icon>
            </a>
        </div>
    </div>
</header>
