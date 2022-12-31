@extends('shop-page.layout.master')
@extends('shop-page.layout.header')
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
                @endforeach
                {{ $sp_all->links() }}
            </div>
        </div>
    </div>
@endsection

