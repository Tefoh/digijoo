@extends('layout')

@section('title', 'ثبت نام')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>ساخت حساب</h2>
            <div class="spacer"></div>

            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="نام" required autofocus>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ایمیل" required>

                <input id="password" type="password" class="form-control" name="password" placeholder="رمز عبور" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تایید رمز عبور"
                    required>

                <div class="login-container">
                    <button type="submit" class="auth-button">ساخت حساب</button>
                    <div class="already-have-container">
                        <p><strong>حساب دارید؟</strong></p>
                        <a href="{{ route('login') }}">وارد سایت شوید</a>
                    </div>
                </div>

            </form>
        </div>

        <div class="auth-right">
        </div>
    </div> <!-- end auth-pages -->
</div>
@endsection
