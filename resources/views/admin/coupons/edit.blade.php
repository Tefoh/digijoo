@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item">  کد تخفیف ها </li>
        <li class="breadcrumb-item active"> ویرایش </li>
    </ol>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class="deep-orange-text"> {{ $error }} </p>
        @endforeach
    @endif
    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        <section class="card-text">
            <h3 class="p-guide" style="text-align: right">ویرایش کد تخفیف {{ $coupon->code }}</h3>
            <div class="row ">
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="code" name="code" class="form-control" placeholder="کد تخفیف" value="{{ old('code') ?? $coupon->code }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <select name="type" id="type">
                            <option>انتخاب کنید</option>
                            <option value="fixed" @if($coupon->type == "fixed") selected @endif>عددی</option>
                            <option value="percent" @if($coupon->type == "percent") selected @endif>درصدی</option>
                        </select>
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="value" name="value" class="form-control" placeholder="مقدار تخفیف" value="{{ old('value') ?? $coupon->value }}">
                    </div>
                </section>
                <section class="col-lg-6">
                    <div class="md-form">
                        <input type="text" id="percent_off" name="percent_off" class="form-control" placeholder="درصد تخفیف" value="{{ old('percent_off') ?? $coupon->percent_off }}">
                    </div>
                </section>
            </div>
        </section>
        <input type="submit" class="btn btn-info" value="ارسال">
    </form>
@endsection