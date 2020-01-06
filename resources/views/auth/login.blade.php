<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link href="/css/admin_login.css" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <ul class="admin_items">
                    <li>
                        <label for="user">{{ __('E-Mail Address') }}：</label>
                        <input type="text" name="email" id="user" size="40" class="admin_input_style" />
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </li>
                    <li>
                        <label for="pwd">{{ __('Password') }}：</label>
                        <input type="password" name="password" id="pwd" size="40" class="admin_input_style" />
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="登录" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="{{ route('register') }}" target="_blank">未拥有账号，前往注册</a></p>
</div>
</body>
</html>