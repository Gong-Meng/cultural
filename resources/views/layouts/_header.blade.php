<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="http://www.mycodes.net/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">{{ Auth::user()->name }}</a></li>
                <li><a href="{{route('password.request')}}">修改密码</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button style="background-color: black; color: white;" type="submit">退出</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>