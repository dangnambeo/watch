@extends('shop-page.layout.master')
@extends('shop-page.layout.header')
@section('section')
    <div class="section">
        <div class="prod">
            <div class="products-item">
                <h2 class="heading">
                    {{ $sp_page->name }}
                </h2>
                <div class="row">
                    <div class="col-md-5">
                        <div class="img-products">
                            <img src="{{ asset($sp_page->img) }}" width="100%" alt="" srcset="">
                        </div>
                    </div>
                    <div class="col-md-7" style="padding: 10px;">
                        <div class="name-products">
                            <h2> {{ $sp_page->name }}</h2>
                        </div>
                        <div class="price-products">
                            @if(($sp_page->discount->percent)==0)
                                <div class="price-items">
                                    <div class="span">{{ number_format($sp_page ->price) }} đ</div>
                                </div>
                            @else
                                <div class="price-sale">
                                    <span class="old-price">{{ number_format($sp_page ->price) }} đ</span>
                                    <span class="sale">{{ $sp_page->discount ->percent }}%</span>
                                </div>
                                <div class="price-items">
                                    <div class="span">{{ number_format(($sp_page ->price)-(($sp_page->price)*($sp_page->discount ->percent)/100)) }} đ</div>
                                </div>
                            @endif
                        </div>
                        <div class="cart-produc">
                            @if((($sp_page ->quantity)-($sp_page->sl_ban))>0)
                                <div class="purchase-cart">
                                    <a onclick="AddCart({{ $sp_page->id }})" href="javascript:" class="add_to_cart">
                                        Thêm vào giỏ hàng
                                    </a>
                                </div>
                            @else
                                <div class="over-product">
                               <span>
                                    Hết hàng
                               </span>
                                </div>
                            @endif
                            <div class="purchase-phone">
                            <span class="phone">
                                Gọi đặt mua:
                            </span>
                                <a href="tel:+84123456789">012.3456.789</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-detail">
                <table class="table table-borderless">
                    <thead class="table-light">
                        <th colspan="2" style="text-align: center; text-transform: uppercase; color: #ffbe76;border-bottom: 2px solid red">Thông số kỹ thuật</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Đường kính mặt:</td>
                            <td>{{ $sp_page->diameter }} mm</td>
                        </tr>
                        <tr>
                            <td>Chống nước:</td>
                            <td>{{ $sp_page->waterproof }} ATM</td>
                        </tr>
                        <tr>
                            <td>Chất liệu mặt:</td>
                            <td>{{ $sp_page->face_material }}</td>
                        </tr>
                        <tr>
                            <td>Năng lượng sử dụng:</td>
                            <td>{{ $sp_page->power }}</td>
                        </tr>
                        <tr>
                            <td>Size dây:</td>
                            <td>{{ $sp_page->size }} mm</td>
                        </tr>
                        <tr>
                            <td>Chất liệu dây:</td>
                            <td>{{ $sp_page->wire_material }}</td>
                        </tr>
                        <tr>
                            <td>Chất liệu vỏ:</td>
                            <td>{{ $sp_page->shell_material }}</td>
                        </tr>
                        <tr>
                            <td>Kiểu dáng:</td>
                            <td>{{ $sp_page->category->cate_tittle }}</td>
                        </tr>
                        <tr>
                            <td>Xuất xứ:</td>
                            <td>
                                @if(($sp_page->origin_id)==1)
                                    JaPan
                                @else
                                    China
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Chế độ bảo hành:</td>
                            <td>Bảo hành trong vòng <span style="font-weight: bold">{{ $sp_page->insurance }}</span> năm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--
        <div class="products-item">
            <h2 class="heading">
                {{ $sp_page->name }}
            </h2>
            <div class="row">
                <div class="col-md-5">
                    <div class="img-products">
                        <img src="{{ asset($sp_page->img) }}" width="100%" alt="" srcset="">
                    </div>
                </div>
                <div class="col-md-7" style="padding: 10px;">
                    <div class="name-products">
                        <h2> {{ $sp_page->name }}</h2>
                    </div>
                    <div class="price-products">
                        @if(($sp_page->discount->percent)==0)
                            <div class="price-items">
                                <div class="span">{{ number_format($sp_page ->price) }} đ</div>
                            </div>
                        @else
                            <div class="price-sale">
                                <span class="old-price">{{ number_format($sp_page ->price) }} đ</span>
                                <span class="sale">{{ $sp_page->discount ->percent }}%</span>
                            </div>
                            <div class="price-items">
                                <div class="span">{{ number_format(($sp_page ->price)-(($sp_page->price)*($sp_page->discount ->percent)/100)) }} đ</div>
                            </div>
                        @endif
                    </div>
                    <div class="cart-produc">
                        @if((($sp_page ->quantity)-($sp_page->sl_ban))>0)
                            <div class="purchase-cart">
                                <a onclick="AddCart({{ $sp_page->id }})" href="javascript:" class="add_to_cart">
                                    Thêm vào giỏ hàng
                                </a>
                            </div>
                        @else
                            <div class="over-product">
                               <span>
                                    Hết hàng
                               </span>
                            </div>
                        @endif
                        <div class="purchase-phone">
                            <span class="phone">
                                Gọi đặt mua:
                            </span>
                            <a href="tel:+84123456789">012.3456.789</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    -->
    </div>

    <div class="section">
        <div class="products">
            <h2 class="heading">
                <a href="{{ route('viewall') }}">
                    Các sản phẩm khác
                </a>
            </h2>
            <div class="row">
                @foreach($sp_other as $list)
                    <div class="col-md-4">
                        <div class="box">
                            <a href="{{ route('viewproducts',$list->id) }}">
                                <img src="{{ asset($list->img) }}" class="img-products" alt="" srcset="">
                            </a>
                            <div class="box-products">
                                <div class="main-product">
                                    <h5><a href="{{ route('viewproducts',$list->id) }}">{{ $list->name }}</a></h5>
                                    <div class="price">
                                        @if(($list->discount ->percent)==0)
                                            <span class="price-new">{{ number_format($list ->price) }} đ</span>
                                        @else
                                            <div class="discount-price">
                                                <span class="price-old">{{ number_format($list ->price) }} đ</span>
                                            </div>
                                            <span class="price-new">{{ number_format(($list ->price)-(($list->price)*($list->discount ->percent)/100)) }} đ</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
    </script>
@endsection
