@extends('layouts.app')

@section("content")
	

	<h1>验证邮箱</h2>
	<div>
		@if (session('resent'))
            <div>
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
		<form action="{{ route('verification.resend') }}" method="POST">
			@csrf
			在继续之前请先验证您的邮箱，如果没有收到邮件，请点击
			<button type="submit">重新发送邮件</button>
		</form>
	</div>

@stop