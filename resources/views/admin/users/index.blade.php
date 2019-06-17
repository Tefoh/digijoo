@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb breadcrumb-main col-lg-6">
        <li class="breadcrumb-item">  کاربران </li>
        <li class="breadcrumb-item active"> لیست </li>
    </ol>

    <div class="row">
        <section class="col-lg-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-block">

                    <div class="card-title">
                        لیست
                        <small>
                            کاربران
                        </small>
                        <div class="pull-left">
                            {{ $users->links() }}
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
                                    ایمیل
                                </th>
                                <th>
                                    نقش
                                </th>
                                <th>
                                    تاریخ ساخت حساب
                                </th>
                                <th>
                                    عکس پروفایل
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->str_role() }}
                                    </td>
                                    <td>
                                        {{ $user->created_at }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" width="250">
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}">ویرایش</a>
                                        <a class="btn btn-danger" href="{{ route('admin.users.destroy', $user->id) }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('destroy-user-' + {{ $user->id }}).submit();">x</a>
                                        <form id="destroy-user-{{ $user->id }}"
                                              action="{{ route('admin.users.destroy', $user->id) }}"
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