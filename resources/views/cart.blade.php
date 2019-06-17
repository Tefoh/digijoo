@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">خانه</a>
        <i class="fa fa-chevron-left breadcrumb-separator"></i>
        <span>سبد خرید</span>
    @endcomponent

    <div class="cart-section container">
        <div>
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

            @if (Cart::count() > 0)

            <h2>{{ Cart::count() }} محصول در سبد خرید</h2>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">حذف</button>
                            </form>

                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">ذخیره برای بعد</button>
                            </form>
                        </div>
                        <div>
                            <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>{{ $item->subtotal }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end cart-table -->

            @if (! session()->has('coupon'))

                <a href="#" class="have-code">کد تخفیف دارید؟</a>

                <div class="have-code-container">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">اعمال</button>
                    </form>
                </div> <!-- end have-code-container -->
            @endif

            <div class="cart-totals">
                    <div>
                        کل خرید <br>
                        @if (session()->has('coupon'))
                            کد تخفیف ({{ session()->get('coupon')['name'] }})
                            <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" style="font-size:14px;">حذف</button>
                            </form>
                            <hr>
                            مجموع <br>
                        @endif
                        مالیات ({{config('cart.tax')}}%)<br>
                        <span class="cart-totals-total">جمع سفارش</span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{ rialPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ rialPrice($discount) }} <br>&nbsp;<br>
                            <hr>
                            {{ rialPrice($newSubtotal) }} <br>
                        @endif
                        {{ rialPrice($newTax) }} <br>
                        <span class="cart-totals-total">{{ rialPrice($newTotal) }}</span>
                    </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{ route('shop.index') }}" class="button">ادامه خرید</a>
                <a href="{{ route('checkout.index') }}" class="button-primary">تکمیل خرید </a>
            </div>

            @else

                <h3>محصولی در سبد خرید نیست!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">ادامه خرید</a>
                <div class="spacer"></div>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{ Cart::instance('saveForLater')->count() }} محصولات ذخیره شده</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">حذف</button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">انتقال به سبد خرید</button>
                            </form>
                        </div>

                        <div>{{ $item->model->rialPrice() }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3>هیچ محصول ذخیره شده ای ندارید.</h3>

            @endif

        </div>

    </div> <!-- end cart-section -->

    @include('partials.might-like')
@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id');
                    const productQuantity = element.getAttribute('data-productQuantity');

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection
