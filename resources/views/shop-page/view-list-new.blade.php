@extends('shop-page.layout.master')
@extends('shop-page.layout.header')
@section('section')
    <div class="section">
        <div class="new">
            <h2 class="heading">
                BLOG
            </h2>
            <div class="row">
                @foreach($news as $list)
                    <div class="col-md-6 item-new">
                        <div class="box">
                            <a href="#">
                                <img src="{{ asset($list->img) }}" class="img-news" width="100%" alt="" srcset="">
                            </a>
                            <div class="box-products">
                                <h5><a href="#">{{ $list->title }}</a></h5>
                                <div class="summary">
                                    {!! $list->summary !!}
                                </div>
                                <div class="read-blog">
                                    <a href="{{ route('new-read',$list->id) }}">
                                        Xem bài viết <i class="fa-regular fa-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
