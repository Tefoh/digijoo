@extends('layout')

@section('title', 'ورود')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
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
            <h2>ورود به حساب کاربری</h2>
            <div class="spacer"></div>

            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ایمیل" required autofocus>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="رمز عبور" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">ورود</button>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> مرا به خاطر داشته باش
                    </label>
                </div>

                <div class="spacer"></div>

                <a href="{{ route('password.request') }}">
                    رمز عبور خود را فراموش کرده اید؟
                </a>

            </form>
        </div>

        <div class="auth-right">
            <h2>حساب کاربری ندارید</h2>
            <div class="spacer"></div>
                <p> تا زمان پراخت به حساب کاربری ندارید.</p>
            <div class="spacer"></div>
            <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow">به عنوان مهمان ادامه دهید</a>
            <div class="spacer"></div>
            &nbsp;
            <div class="spacer"></div>
                <p>یا همین الان یک حساب کاربری ایجاد کنید.</p>
                <div class="spacer"></div>
                <a href="{{ route('register') }}" class="auth-button-hollow">حساب کاربری بسازید</a>
        </div>
    </div>
</div>
@endsection
