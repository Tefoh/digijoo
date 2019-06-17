@extends('layout')

@section('title', 'تصویه سبد')

@section('extra-css')
    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>

@endsection

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="checkout-heading stylish-heading">پرداخت</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">ایمیل</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>

                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="button-primary full-width">ارسال به درگاه</button>


                </form>

            </div>



            <div class="checkout-table-container">
                <h2>سبد خرید شما</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                <div class="checkout-table-price">{{ $item->model->rialPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        جمع سبد خرید <br>
                        @if (session()->has('coupon'))
                            تخفیف ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            جمع جدید <br>
                        @endif
                        مالیات ({{config('cart.tax')}}%)<br>
                        <span class="checkout-totals-total">مبلغ قابل پرداخت</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ rialPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ rialPrice($discount) }} <br>
                            <hr>
                            {{ rialPrice($newSubtotal) }} <br>
                        @endif
                        {{ rialPrice($newTax) }} <br>
                        <span class="checkout-totals-total">{{ rialPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection
