@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb breadcrumb-main col-lg-6">
        <li class="breadcrumb-item">  دسته بندی ها </li>
        <li class="breadcrumb-item active"> لیست </li>
    </ol>

    <div class="row">
        <section class="col-lg-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-block">

                    <div class="card-title">
                        لیست
                        <small>
                            دسته بندی ها
                        </small>
                        <div class="pull-left">
                            {{ $orders->links() }}
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
                                    نام پرداخت کننده
                                </th>
                                <th>
                                    وضعیت
                                </th>
                                <th>
                                    تخفیف
                                </th>
                                <th>
                                    کد تخفیف
                                </th>
                                <th>
                                    مالیات
                                </th>
                                <th>
                                    مجموع کل
                                </th>
                                <th>
                                    جمع کالا ها
                                </th>
                                <th>
                                    شماره تراکنش
                                </th>
                                <th>
                                    ای پی کاربر
                                </th>
                                <th>
                                    زمان ایجاد تراکنش
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order->user->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $order->error }}
                                    </td>
                                    <td>
                                        {{ $order->discount }}
                                    </td>
                                    <td>
                                        {{ $order->discount_code }}
                                    </td>
                                    <td>
                                        {{ rialPrice($order->tax) }}
                                    </td>
                                    <td>
                                        {{ rialPrice($order->total) }}
                                    </td>
                                    <td>
                                        {{ rialPrice($order->proce) }}
                                    </td>
                                    <td>
                                        {{ $order->tans_id }}
                                    </td>
                                    <td>
                                        {{ $order->ip }}
                                    </td>
                                    <td>
                                        {{ $order->created_at }}
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('admin.orders.destroy', $order->id) }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('destroy-coupon-' + {{ $order->id }}).submit();">x</a>
                                        <form id="destroy-coupon-{{ $order->id }}"
                                              action="{{ route('admin.orders.destroy', $order->id) }}"
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