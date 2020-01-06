<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link href="/css/admin_login.css" rel="stylesheet" type="text/css" />
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    @include("shared._error")
    @include("shared._messages")
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="{{route('password.email')}}" method="post">
                @csrf
                <ul class="admin_items">
                    <li>
                        <label for="user">邮箱：</label>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" id="email" size="40" class="admin_input_style" />
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="发送邮件" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <p class="admin_copyright"><a tabindex="5" href="http://www.mycodes.net/" target="_blank">返回首页</a> &copy; 2014 Powered by <a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>