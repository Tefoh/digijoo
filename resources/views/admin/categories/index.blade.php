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
                            {{ $categories->links() }}
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
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        {{ $category->slug }}
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}">ویرایش</a>
                                        <a class="btn btn-danger" href="{{ route('admin.categories.destroy', $category->id) }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('destroy-category-' + {{ $category->id }}).submit();">x</a>
                                        <form id="destroy-category-{{ $category->id }}"
                                              action="{{ route('admin.categories.destroy', $category->id) }}"
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