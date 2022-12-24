@extends('shop-page.layout.master')
@extends('shop-page.layout.header')
@section('section')
    <div class="section">
        <div class="products-item">
            <h2 class="heading">Giỏ hàng của bạn</h2>
        </div>
    </div>
    <div class="section">
        <div class="list-cart">
            <div class="list-cart-prod" id="list-cart">
                <div class="cart-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" colspan="2">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Session::has("Cart") != null)
                            @foreach(Session::get("Cart")->products as $list)
                                <tr>
                                    <td style="width: 150px">
                                        <img src="{{ asset($list['productInfo']->img) }}" width="100%" alt="" />
                                    </td>
                                    <td>{{ $list['productInfo']->name }}</td>
                                    <td>
                                        @if(($list['productInfo']->discount ->percent)== 0)
                                            <span class="newprice">{{ number_format($list['productInfo']->price) }} đ</span>
                                        @else
                                            <span class="newprice">{{ number_format(($list['productInfo'] ->price)-(($list['productInfo']->price)*($list['productInfo']->discount ->percent)/100)) }} đ</span>
                                            <span class="oldprice">{{ number_format($list['productInfo']->price) }} đ</span>
                                        @endif
                                    </td>
                                    <td style="width: 100px">
                                        <input id="quanty-item-{{ $list['productInfo']->id }}" min="0" max="{{ $list['productInfo']->quantity }}" class="form-control" type="number" value="{{ $list['quanty'] }}" />
                                    </td>
                                    <td>
                                        <span class="totalprice">{{ number_format($list['price']) }} đ</span>
                                    </td>
                                    <td>
                                        <span class="edit" onclick="editListCart({{ $list['productInfo']->id }});"><i class="fa-solid fa-pen-to-square"></i></span>
                                        <span onclick="delListCart({{ $list['productInfo']->id }});" class="del"><i class="fa-solid fa-trash-can"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center; color: #e17055; font-weight: bold; text-transform: uppercase">Không có sản phẩm nào trong giỏ hàng của bạn</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        @if(Session::has("Cart") != null)
                        <div class="total-bill">
                            <p>
                                <span>Tổng số lượng:</span>
                                <span>{{ number_format(Session::get("Cart")->totalQuanty) }}  bộ</span>
                            </p>
                            <p>
                                <span>Thành tiền:</span>
                                <span class="red-text">{{ number_format(Session::get("Cart")->totalPrice) }}  đ</span>
                            </p>
                        </div>
                        @endif
                    </div>
                    @if(Session::has("Cart") != null)
                        <div class="col-lg-4 offset-lg-8">
                            <div class="buton-buy">
                                <a href="{{ route('delivery') }}">Tiến hành đặt hàng <i class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function delListCart(id){
            console.log(id);

            $.ajax({
                url: '/Del-list-Cart/'+id,
                type: 'GET'
            }).done(function (response){
                console.log(response);
                RenderListCart(response);
                alertify.success('Xóa thành công sản phẩm trong giỏ hàng');
            });
        }

        function editListCart(id){

           // $("#quanty-item-"+id).val();

            $.ajax({
                url: '/Edit-list-Cart/'+id+'/'+$("#quanty-item-"+id).val(),
                type: 'GET'
            }).done(function (response){
                console.log(response);
                RenderListCart(response);
                alertify.success('Cập nhật thành công sản phẩm trong giỏ hàng');
            });
        }

        function RenderListCart(response){

            $("#list-cart").empty();
            $("#list-cart").html(response);
            $("#total-quanty-show").text($("#total-quanty-cart").val());
        }

    </script>
@endsection
