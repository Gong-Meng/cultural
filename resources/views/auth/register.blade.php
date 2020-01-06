<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    @include("shared._error")
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="{{route('register')}}" method="post">
                @csrf
                <ul class="admin_items">
                    <li>
                        <label for="user">{{ __('Name') }}：</label>
                        <input type="text" name="name" value="" id="name" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="user">{{ __('E-Mail Address') }}：</label>
                        <input type="text" name="email" value="" id="email" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">{{ __('Password') }}：</label>
                        <input type="password" name="password" value="" id="password" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">{{ __('Confirm Password') }}：</label>
                        <input type="password" name="password_confirmation" value="" id="password_confirmation" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="注册" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="{{ route('login') }}" target="_blank">已有账号，前往登录</a></p>
</div>
</body>
</html>