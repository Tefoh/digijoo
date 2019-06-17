@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb breadcrumb-main col-lg-6">
        <li class="breadcrumb-item">  محصولات ها </li>
        <li class="breadcrumb-item active"> لیست </li>
    </ol>

    <div class="row">
        <section class="col-lg-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-block">

                    <div class="card-title">
                        لیست
                        <small>
                            محصولات
                        </small>
                        <div class="pull-left">
                            {{ $products->links() }}
                        </div>
                    </div>

                    <div class="col-lg-6">
                    </div>
                    <hr>
                    <div class="card-text">
                        <table class="table table-sm">
                            <thead class="thead-inverse">
                            <tr>
                                <th>
                                    نام
                                </th>
                                <th>
                                    سلاگ
                                </th>
                                <th>
                                    جزئیات
                                </th>
                                <th>
                                    قیمت
                                </th>
                                <th>
                                    توضیحات
                                </th>
                                <th>
                                    ویژه
                                </th>
                                <th>
                                    عکس
                                </th>
                                <th>
                                    موجودی
                                </th>
                                <th>
                                    عکس ها
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->slug }}
                                    </td>
                                    <td>
                                        {{ $product->details }}
                                    </td>
                                    <td>
                                        {{ $product->rialPrice() }}
                                    </td>
                                    <td>
                                        {{ $product->description }}
                                    </td>
                                    <td>
                                        {{ $product->featured }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="200">
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td>
                                        @foreach (json_decode($product->images) as $image)
                                            <img src="{{ asset($image) }}" alt="" width="200">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.products.edit', $product->id) }}">ویرایش</a>
                                        <a class="btn btn-danger" href="{{ route('admin.products.destroy', $product->id) }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('destroy-product-' + {{ $product->id }}).submit();">x</a>
                                        <form id="destroy-product-{{ $product->id }}"
                                              action="{{ route('admin.products.destroy', $product->id) }}"
                                              method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection