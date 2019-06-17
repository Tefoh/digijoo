@extends('layout')

@section('title', 'بازیابی رمز عبور')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
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
            <h2>بازیابی رمز عبور</h2>
            <div class="spacer"></div>
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="ایمیل" required autofocus>

                <input id="password" type="password" class="form-control" name="password" placeholder="رمز عبور جدید" required>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="رمز عبور" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">بازیابی</button>
                </div>

            </form>
        </div>
        <div class="auth-right">
        </div>
    </div>
</div>
@endsection



