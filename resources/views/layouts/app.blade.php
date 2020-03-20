<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title',"『豪情』后台管理")</title>
	<link rel="stylesheet" type="text/css" href="/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <script type="text/javascript" src="/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
</head>
<body>
	@include("layouts._header")

	<div class="container clearfix">
		@yield('content')
	</div>
	
	@include("layouts._footer")
</body>
</html>