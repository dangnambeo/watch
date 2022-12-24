@extends('shop-page.layout.master')
@extends('shop-page.layout.header')
@section('banner')
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <?php $i =0; ?>
                @foreach ($slide as $banner)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"  aria-label="Slide 1" @if ($i==0)
                            class="active" aria-current="true"
                            @endif></button>
                    <?php $i++; ?>
                @endforeach
            </div>
            <div class="carousel-inner">
                <?php $i=0; ?>
                @foreach ($slide as $banner)
                    <div @if ($i==0)
                             class="carousel-item active"
                         @else
                             class="carousel-item"
                        @endif>
                        <img src="{{$banner->img_slide}}" class="d-block w-100" alt="">
                    </div>
                    <?php $i++ ?>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
@section('section')
    <div class="section">
        <div class="products">
            <h2 class="heading">
                <a href="{{ route('viewall') }}">
                    Ghế sofa
                </a>
            </h2>
            <div class="row">
                @foreach($sp_all as $list)
                    <div class="col-md-3 item">
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
                                <div class="cart">
                                    <button type="submit" onclick="AddCart({{ $list->id }})" class="add_to_cart">
                                        <lord-icon
                                                src="https://cdn.lordicon.com/rmzhcgbh.json"
                                                trigger="hover"
                                                style="width:40px;height:40px">
                                        </lord-icon>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
