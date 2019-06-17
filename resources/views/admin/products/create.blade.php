@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item">  محصولات </li>
        <li class="breadcrumb-item active"> ساخت </li>
    </ol>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class="deep-orange-text"> {{ $error }} </p>
        @endforeach
    @endif
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="card-text">
            <h3 class="p-guide" style="text-align: right">ساخت محصول جدید</h3>
            <div class="row ">
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="name" name="name" class="form-control" placeholder="نام محصول" value="{{ old('name') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="سلاگ" value="{{ old('slug') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="quantity" name="quantity" class="form-control" placeholder="موجودی" value="{{ old('quantity') }}">
                    </div>
                </section>
                <section class="col-lg-12">
                    <div class="md-form">
                        <input type="text" id="details" name="details" class="form-control" placeholder="جزئیات" value="{{ old('details') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="price" name="price" class="form-control" placeholder="قیمت" value="{{ old('price') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="checkbox" id="chk-f-light-blue" name="featured" class="chk-col-light-blue filled-in">
                        <label for="chk-f-light-blue">محصول ویژه</label>
                    </div>
                </section>
                <section class="col-lg-12">
                    <div class="md-form">
                        <textarea class="ckeditor" id="description" name="description"></textarea>
                    </div>
                </section>
                <section class="col-lg-12">
                    <div class="md-form">
                        عکس پیش فرض
                        <input type="file" id="image" name="image">
                    </div>
                </section>
                <section class="col-lg-12">
                    <div class="md-form">
                        دیگر عکس ها
                        <input type="file" id="images" name="images[]" multiple="multiple">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        @foreach ($categories as $category)
                            <input type="checkbox" id="category-{{ $category->id }}" name="categories[]" class="chk-col-light-blue filled-in" value="{{ $category->id }}">
                            <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                            <br>
                        @endforeach
                    </div>
                </section>
            </div>
        </section>
        <input type="submit" class="btn btn-info" value="ارسال">
    </form>
@endsection

@section('extra-js')
    <script type="text/javascript" src="/admin-lte/plugins/ckeditor/ckeditor.js"></script>
@endsection