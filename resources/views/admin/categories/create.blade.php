@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item">  دسته بندی ها </li>
        <li class="breadcrumb-item active"> ساخت </li>
    </ol>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class="deep-orange-text"> {{ $error }} </p>
        @endforeach
    @endif
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <section class="card-text">
            <h3 class="p-guide" style="text-align: right">ساخت دسته بندی جدید</h3>
            <div class="row ">
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="نام دسته بندی" value="{{ old('name') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="سلاگ" value="{{ old('slug') }}">
                    </div>
                </section>
            </div>
        </section>
        <input type="submit" class="btn btn-info" value="ارسال">
    </form>
@endsection