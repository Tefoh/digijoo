@extends('layout')

@section('title', 'پروفایل من')

@section('extra-css')
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">خانه</a>
        <i class="fa fa-chevron-left breadcrumb-separator"></i>
        <span>پروفایل من</span>
    @endcomponent

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="products-section container">
        <div class="sidebar">

            <ul>
              <li class="active"><a href="{{ route('users.edit') }}">پروفایل من</a></li>
              <li><a href="{{ route('orders.index') }}">سفارش های من</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="products-header">
                <h1 class="stylish-heading">پروفایل من</h1>
            </div>

            <div>
                <form action="{{ route('users.update') }}" method="POST">
                    @method('patch')
                    @csrf
                    <div>
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="نام" required>
                    </div>
                    <div>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="ایمیل" required>
                    </div>
                    <div>
                        <input class="form-control" id="password" type="password" name="password" placeholder="رمز عبور">
                        <div>اگر میخاهید رمز قبلی بماند این قسمت را پر نکنید.</div>
                    </div>
                    <div>
                        <input class="form-control" id="password-confirm" type="password" name="password_confirmation" placeholder="تایید رمز عبور">
                    </div>
                    <div>
                        <button type="submit" class="my-profile-button">اپدیت پروفایل</button>
                    </div>
                </form>
            </div>

            <div class="spacer"></div>
        </div>
    </div>

@endsection

@section('extra-js')
@endsection
