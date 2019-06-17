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
                            {{ $coupons->links() }}
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
                                    کد
                                </th>
                                <th>
                                    نوع
                                </th>
                                <th>
                                    مقدار تخفیف
                                </th>
                                <th>
                                    درصد تخفیف
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>
                                        {{ $coupon->code }}
                                    </td>
                                    <td>
                                        {{ $coupon->getType() }}
                                    </td>
                                    <td>
                                        {{ $coupon->value }}
                                    </td>
                                    <td>
                                        {{ $coupon->percent_off }}
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.coupons.edit', $coupon->id) }}">ویرایش</a>
                                        <a class="btn btn-danger" href="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('destroy-coupon-' + {{ $coupon->id }}).submit();">x</a>
                                        <form id="destroy-coupon-{{ $coupon->id }}"
                                              action="{{ route('admin.coupons.destroy', $coupon->id) }}"
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