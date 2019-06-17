@component('mail::message')
# سفارش

**شماره سفارش:** {{ $order->id }}

**جمع سفارش:** {{ $order->total }}

**محصولات سفارش داده**

@foreach ($order->products as $product)
نام: {{ $product->name }} <br>
قیمت: {{ $product->price}} <br>
تعداد: {{ $product->pivot->quantity }} <br>
@endforeach

اطلاعات بیشتر را در حساب خود پیدا کنید

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
رفتن به سایت
@endcomponent

ممنون که ما را انتخاب کردید.

<br>
{{ config('app.name') }}
@endcomponent
