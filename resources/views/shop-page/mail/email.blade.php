<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .section {
            width: 1260px;
            margin: 0 auto;
            padding: 100px;
            background: #fff;
        }
        .box {
            background: #b2bec3;
            padding: 10px;
            border-radius: 10px;
        }
        .styled-table {
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            background: #636e72;
        }
        .styled-table thead tr {
            background-color: #74b9ff;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
            background: #fff;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            background: #81ecec;
            color: black;
        }
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<h2>SOFA-T xin thông báo đã nhận được đơn đặt hàng của bạn. </h2>
<div class="section">
    <div class="box">
        <h2 style="text-align: center; color: red;text-transform: uppercase;">Thông tin đặt hàng</h2>
        <table class="styled-table">
            <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Sản phẩm</th>
                <th style="text-align: center">Đơn giá</th>
                <th style="text-align: center">Khuyến mãi</th>
                <th style="text-align: center">Số lượng</th>
                <th style="text-align: center">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @if(Session::has("Cart") != null)
                <?php $i = 1; ?>
                @foreach(Session::get("Cart")->products as $list)
                    <tr>
                        <td style="text-align: center">
                           {{ $i }}
                        </td>
                        <td>
                            {{ $list['productInfo']->name }}
                        </td>
                        <td style="text-align: center">{{ number_format($list['productInfo']->price) }} đ</td>
                        <td style="text-align: center">{{ $list['productInfo']->discount->percent }}%</td>
                        <td style="text-align: center">{{ $list['quanty'] }}</td>
                        <td style="text-align: center">{{ number_format($list['price']) }} đ</td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @endif
            @if(Session::has("Cart") != null)
            <tr class="active-row">
                <td colspan="4" style="text-align: center">Tổng tiền</td>
                <td colspan="2" style="text-align: center">{{ number_format(Session::get("Cart")->totalPrice) }}  đ</td>
            </tr>
            @endif
            <!-- and so on... -->
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
