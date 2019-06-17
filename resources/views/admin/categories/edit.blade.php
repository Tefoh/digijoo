@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item">  دسته بندی ها </li>
        <li class="breadcrumb-item active"> ویرایش دسته {{ $category->name }} </li>
    </ol>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        <section class="card-text">
            <h3 class="p-guide" style="text-align: right">ویرایش دسته بندی {{ $category->name }}</h3>
            <div class="row ">
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="نام دسته بندی" value="{{ old('name') ?? $category->name }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="slug" class="form-control" value="{{ $category->slug }}" disabled>
                    </div>
                </section>
            </div>
        </section>
        <input type="submit" class="btn btn-info" value="ارسال">
    </form>
@endsection