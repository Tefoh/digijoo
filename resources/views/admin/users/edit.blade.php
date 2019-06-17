@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item">  کاربران </li>
        <li class="breadcrumb-item active"> ویرایش </li>
    </ol>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class="deep-orange-text"> {{ $error }} </p>
        @endforeach
    @endif
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <section class="card-text">
            <h3 class="p-guide" style="text-align: right">ویرایش کاربر {{ $user->name }}</h3>
            <div class="row ">
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="نام کاربر" value="{{ old('name') ?? $user->name }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="email" id="email" name="email" class="form-control" placeholder="ایمیل" value="{{ old('email') ?? $user->email }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="password" name="password" class="form-control" placeholder="رمز عبور(اگر میخواهید رمز تغییر نکند این قسمت را پر نکنید)">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <select name="role_id" id="role_id">
                            <option value="0">کاربر عادی</option>
                            <option value="1" @if($user->role_id == 1) selected @endif>مدیر</option>
                        </select>
                    </div>
                </section>
                <section class="col-lg-12">
                    <div class="md-form">
                        عکس پروفایل(اگر میخواهید عکس تغییر نکند این قسمت را تغییر ندهید)
                        <input type="file" id="avatar" name="avatar" accept="image/*">
                    </div>
                </section>
            </div>
        </section>
        <input type="submit" class="btn btn-info" value="ارسال">
    </form>
@endsection