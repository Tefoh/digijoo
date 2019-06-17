@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item">  کد تخفیف ها </li>
        <li class="breadcrumb-item active"> ساخت </li>
    </ol>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class="deep-orange-text"> {{ $error }} </p>
        @endforeach
    @endif
    <form action="{{ route('admin.coupons.store') }}" method="POST">
        @csrf
        <section class="card-text">
            <h3 class="p-guide" style="text-align: right">ساخت کد تخفیف جدید</h3>
            <div class="row ">
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="code" name="code" class="form-control" placeholder="کد تخفیف" value="{{ old('code') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <select name="type" id="type">
                            <option>انتخاب کنید</option>
                            <option value="fixed">عددی</option>
                            <option value="percent">درصدی</option>
                        </select>
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="value" name="value" class="form-control" placeholder="مقدار تخفیف" value="{{ old('value') }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="percent_off" name="percent_off" class="form-control" placeholder="درصد تخفیف" value="{{ old('percent_off') }}">
                    </div>
                </section>
            </div>
        </section>
        <input type="submit" class="btn btn-info" value="ارسال">
    </form>
@endsection