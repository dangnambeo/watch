<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('FE_asset/css/style.css') }}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('FE_asset/bootstrap/css/bootstrap.min.css') }}" />

    <script src="{{ asset('FE_asset/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('FE_asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('FE_asset/fontawesome/css/all.css') }}" />
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="clean"></div>
@yield('banner')
<div class="section">
    <div class="service">
        <div class="box-container">
            <div class="box">
                <lord-icon
                    src="https://cdn.lordicon.com/jyijxczt.json"
                    trigger="loop"
                    colors="primary:#3a3347,secondary:#ffc738,tertiary:#ebe6ef,quaternary:#646e78"
                    style="width:80px;height:80px">
                </lord-icon>
                <h3>Giao hàng nhanh</h3>
            </div>
            <div class="box">
                <lord-icon
                    src="https://cdn.lordicon.com/nxvrkirq.json"
                    trigger="loop"
                    colors="primary:#eeaa66"
                    style="width:80px;height:80px">
                </lord-icon>
                <h3>Đổi trả trong vòng 1 tháng</h3>
            </div>
            <div class="box">
                <lord-icon
                    src="https://cdn.lordicon.com/vkweisbr.json"
                    trigger="loop"
                    colors="outline:#121331,primary:#646e78,secondary:#2ca58d,tertiary:#4bb3fd"
                    style="width:80px;height:80px">
                </lord-icon>
                <h3>Hỗ trợ 24/7</h3>
            </div>
        </div>
    </div>
</div>
@yield('section')
<div class="clean"></div>
<footer class="footer">
    <div class="main-footer">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <img src="{{ asset('/image/logo3.png') }}" alt="" width="100%" srcset="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="insurance">
                    <div class="news">
                        <a href=""><p>Giới thiệu về cửa hàng</p></a>
                        <a href=""><p>Chính sách mua hàng</p></a>
                        <a href=""><p>Giới thiệu giao hàng và lắp đặt</p></a>
                        <a href=""><p>Chính sách bảo hành</p></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
@yield('script')
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script>
    function AddCart(id){
        $.ajax({
           url: '/Add-Cart/'+id,
           type: 'GET'
        }).done(function (response){
           console.log(response);
            RenderCart(response);
            alertify.success('Thêm thành công sản phẩm vào giỏ hàng');
        });
    }

    $("#change-item-cart").on("click", ".del-cart-item span", function (){
        $.ajax({
            url: '/Del-Item-Cart/'+$(this).data("id"),
            type: 'GET'
        }).done(function (response){
            console.log(response);
            RenderCart(response);
            alertify.success('Xóa thành công sản phẩm trong giỏ hàng');
        });
    });
    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-cart").val());

    }
</script>
@include('sweetalert::alert')
</body>
</html>
