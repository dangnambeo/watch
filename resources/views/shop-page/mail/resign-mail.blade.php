<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .wrap {
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 1170px;
            margin: auto;
        }
        .form {
            width: 350px;
            margin: 100px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
        }
        .form-group {
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
            overflow: hidden;
            box-sizing: border-box;
            text-align: center;
        }
        .form-group:last-child {
            margin-bottom: 0;
            background: #3f4240;
        }
        .form-group .btn-submit {
            text-decoration: none;
            text-transform: uppercase;
            line-height: 35px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            background: #3f4240;
            outline: none;
            border: none;
        }
        input {
            width: 100%;
            height: 40px;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #f2f2f2;
            padding-left: 10px;
        }
        .name {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="wrap">
        <div class="container">

            <div class="form">
                <div class="name"><h1>Test gửi mail</h1></div>
                <form action="{{ route('send-mail') }}" method="post" class="resign_form">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="emails" placeholder="Email nhận thông báo gửi mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Gửi đăng kí Email</button>
                        {{-- <a href="javascript:;" class="btn-submit">Gửi đăng kí Email</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
