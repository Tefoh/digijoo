@extends('layouts.admin')

@section('content')
    <ol class="breadcrumb breadcrumb-main">
        <li class="breadcrumb-item"> داشبورد </li>
        <li class="breadcrumb-item active"> اصلی </li>
    </ol>
    <div class="row">
        <section class="col-lg-3 col-sm-6 col-md-4">
            <div class="widget-large amber">
                <div class="widget-large-panel">
                    <div class="widget-large-icon">
                        <i class="fa fa-user"></i>
                        <span>
                            کاربران
                        </span>
                    </div>
                    <div class="widget-body">
                        <p>افزایش کاربران</p>
                        <span>۵۰٪</span>
                        <div class="progress">
                            <div class="progress-bar amber darken-2" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="widget-large-footer  waves-effect">
                    <a class="white-text" href="#">
                        مشاهده همه

                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
            </div>
        </section>
        <section class="col-lg-3 col-sm-6 col-md-4">
            <div class="widget-large pink">
                <div class="widget-large-panel">
                    <div class="widget-large-icon">
                        <i class="fa fa-server"></i>
                        <span>
                            سرور ها
                        </span>
                    </div>
                    <div class="widget-body">
                        <p>ترافیک پردازنده</p>
                        <span>۵۰٪</span>
                        <div class="progress">
                            <div class="progress-bar pink darken-2" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="widget-large-footer  waves-effect">
                    <a class="white-text" href="#">
                        مشاهده همه

                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
            </div>
        </section>
        <section class="col-lg-3 col-sm-6 col-md-4">
            <div class="widget-large cyan">
                <div class="widget-large-panel">
                    <div class="widget-large-icon">
                        <i class="fa fa-shopping-bag"></i>
                        <span>
                            فروش ها
                        </span>
                    </div>
                    <div class="widget-body">
                        <p>افزایش فروش</p>
                        <span>۸۹٪</span>
                        <div class="progress">
                            <div class="progress-bar cyan darken-2" role="progressbar" style="width: 89%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="widget-large-footer  waves-effect">
                    <a class="white-text" href="#">
                        مشاهده همه

                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
            </div>
        </section>
        <section class="col-lg-3 col-sm-6 col-md-4">
            <div class="widget-large green">
                <div class="widget-large-panel">
                    <div class="widget-large-icon">
                        <i class="fa fa-random"></i>
                        <span>
                             تراکنش ها
                        </span>
                    </div>
                    <div class="widget-body">
                        <p>کاهش تراکنش ها</p>
                        <span>۲۳٪</span>
                        <div class="progress">
                            <div class="progress-bar green darken-2" role="progressbar" style="width: 23%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="widget-large-footer  waves-effect">
                    <a class="white-text" href="#">
                        مشاهده همه

                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <section class="card-block">
                    <section class="card-text">
                        <div id="bar_chart" style="height: 246px;"></div>

                    </section>
                </section>
                <div class="card-footer teal white-text">
                    <p class="font-14">
                        نمودار رشد شرکت
                        <span class="pull-left">
                            رشد ۵۱ درصدی
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <section class="card-block">
                    <section class="card-text">
                        <table class="table table-hover table-striped table-sm">
                            <thead>
                            <tr>
                                <th>
                                    ردیف
                                </th>
                                <th>
                                    برنامه
                                </th>
                                <th>
                                    مدیر بخش
                                </th>
                                <th>
                                    میزان پیشرفت
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>۱</td>
                                <td>ساخت درگاه بانکی جدید</td>
                                <td>امیر رسولی</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar blue progress-bar-striped active" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>۲</td>
                                <td> راه اندازی پروژه بازی  </td>
                                <td> علی حبیبی </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar red progress-bar-striped active" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>۳</td>
                                <td> بازسازی وبسایت فروش </td>
                                <td> محمد شریفی </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar pink progress-bar-striped active" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>۴</td>
                                <td> طراحی سیستم پیامرسان شرکت </td>
                                <td> رضا حمیدی </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar purple progress-bar-striped active" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>۶</td>
                                <td> ساخت بازی جدید برای گوشی و سیستم </td>
                                <td> وحید شمسی </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar green progress-bar-striped active" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>۷</td>
                                <td> گسترش جغرافیایی شرکت </td>
                                <td> امین رسولی </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar amber progress-bar-striped active" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </section>
                </section>
                <section class="card-footer orange white-text">
                    <p class="font-14">
                        برنامه های شرکت
                    </p>
                </section>
            </div>
        </div>
    </div>
    <div class="row">
        <section class="col-lg-4">
            <div class="card light-green white-text">
                <div class="card-block">
                    <section class="card-text">
                        <p class="font-14 bold text-center">تگ های پر بازدید</p>
                        <div>
                            #برنامه نویسی
                            <span class="pull-left">
                                ۵۶۰۰
                            </span>
                        </div>
                        <div>
                            #شبکه های عصبی
                            <span class="pull-left">
                                ۳۴۰۰
                            </span>
                        </div>
                        <div>
                            #سخت افزار ها
                            <span class="pull-left">
                                ۱۹۰۰
                            </span>
                        </div>
                        <div>
                            #فروش های برتر
                            <span class="pull-left">
                                ۱۲۵۰
                            </span>
                        </div>
                        <div>
                            #تخفیف ۵۰ درصدی
                            <span class="pull-left">
                                ۹۰۰
                            </span>
                        </div>
                        <div>
                            #زبان برنامه نویسی جدید
                            <span class="pull-left">
                                ۵۴۰
                            </span>
                        </div>
                        <div>
                            #پردازنده های نسل جدید
                            <span class="pull-left">
                                ۲۴۰
                            </span>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <section class="col-lg-8 col-sm-12">
            <div class="card">
                <section class="card-header purple white-text">
                    <p class="font-14">
                        آمار های اصلی
                    </p>
                </section>
                <section class="card-text card-block">
                    <div class="row">
                        <section class="col-lg-4">
                            <p class="bold">
                                ثبت نام جدید

                                <span class="green-text pull-left font-normal">
                                     ۲۸٪
                                     <i class="fa fa-level-up"></i>
                                 </span>
                            </p>
                            <hr />
                            <p class="bold">
                                میزان فروش
                                <span class="red-text pull-left font-normal">
                                     ۱۰٪
                                     <i class="fa fa-level-down"></i>
                                 </span>
                            </p>
                            <hr />
                            <p class="bold">
                                میزان افزایش درآمد
                                <span class="green-text pull-left font-normal">
                                     ۱٪
                                     <i class="fa fa-level-up"></i>
                                 </span>
                            </p>
                        </section>
                        <section class="col-lg-8">
                            <div id="multiple_axis_chart" style="height: 140px;"></div>
                        </section>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection