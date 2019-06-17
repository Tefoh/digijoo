<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') ?? 'فروشگاه' }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo"><span>دیجی جو</span></div>
                    </div>
                    <div class="top-nav-right">
                        @include('partials.menus.main-right')
                    </div>
                </div> <!-- end top-nav -->
                <div class="hero container">
                    <div class="hero-copy">
                        <h1>سایت فروشگاهی</h1>
                        <p>شامل محصولات با دسته بندی های جدا و یک سبد خرید و درگاه پرداخت.</p>
                        <p>این سایت فرشگاهی نیست بلکه دمویی از یک پروژه میباشد.</p>
                        <p>هرگونه خرید از این سایت به عهده کاربر و به عنوان دونیت در نظر گرفته میشود :)</p>
                        <div class="hero-buttons">
                            <a href="https://github.com/Tefoh/digijoo" class="button button-white">GitHub</a>
                        </div>
                    </div> <!-- end hero-copy -->

                    <div class="hero-image">
                        <img src="{{ asset('img/macbook-pro-laravel.png') }}" alt="hero image">
                    </div> <!-- end hero-image -->
                </div> <!-- end hero -->
            </header>

            <div class="featured-section">

                <div class="container">
                    <h1 class="text-center"><span>دیجی جو</span></h1>

                    <p class="section-description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>

                    <div class="text-center button-container">
                        <a href="#" class="button">ویژه</a>
                        <a href="#" class="button">موجود</a>
                    </div>

                    <div class="products text-center">
                        @foreach ($products as $product)
                            <div class="product">
                                <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product"></a>
                                <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                <div class="product-price">{{ $product->rialPrice() }}</div>
                            </div>
                        @endforeach

                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">مشاهده محصولات</a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            <blog-posts></blog-posts>

            @include('partials.footer')

        </div> <!-- end #app -->
        <script src="/js/app.js"></script>
    </body>
</html>
