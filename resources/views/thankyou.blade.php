@extends('layout')

@section('title', 'تشکر')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>تشکر برای <br> سفارشتان!</h1>
       <p>یک ایمیل برای شما ارسال شد</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">صفحه اصلی</a>
       </div>
   </div>




@endsection
