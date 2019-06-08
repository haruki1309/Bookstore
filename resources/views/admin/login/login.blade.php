<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('css/Admin/admin_login.css')}}"
        <link href="https://fonts.googleapis.com/css?family=Alegreya+SC" rel="stylesheet">
    </head>
    <body>
        <div id="background-color">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}";>
            <h1>
            <img src="{!! url('asset/login.png') !!}" height="22px" width="22px">
               LOGIN</h1>
            <input placeholder="Tên đăng nhập" type="text" required="" name="username">
            <input placeholder="Mật khẩu" type="password" required="" name="password">
            <button type="submit">Đăng nhập</button>
            <!-- <a>Quên mật khẩu?</a> -->
        </form>
        </div>
    </body>
</html>