@extends('layout')

@section('title', 'نتیجه های جستجو')

@section('extra-css')
@endsection

@section('content')

    @component('components.breadcrumbs')
        <a href="/">خانه</a>
        <i class="fa fa-chevron-left breadcrumb-separator"></i>
        <span>جستجو</span>
    @endcomponent

    <div class="container">
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
    </div>

    <div class="search-results-container container">
        <h1>نتیجه جستجو</h1>
        <p class="search-results-count">{{ $products->total() }} نتیجه برای '{{ request()->input('query') }}'</p>

        @if ($products->total() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>نام</th>
                    <th>جزئیات</th>
                    <th>شرح</th>
                    <th>قیمت</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></th>
                        <td>{{ $product->details }}</td>
                        <td>{{ \Str::limit($product->description, 80) }}</td>
                        <td>{{ $product->rialPrice() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->appends(request()->input())->links() }}
        @endif
    </div> <!-- end search-results-container -->

@endsection

@section('extra-js')
@endsection
