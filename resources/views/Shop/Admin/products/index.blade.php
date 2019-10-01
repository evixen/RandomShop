@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('Shop.Admin.result_messages')

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('shop.admin.products.create') }}" class="btn btn-primary">Добавить</a>
                    <a href="{{ route('shop.admin.products.deleted') }}" class="btn btn-secondary ml-auto">
                        Показать архивные</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Товар</th>
                                <th>Категория</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <a href="{{ route('shop.admin.products.edit', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if(!empty($product->category->title))
                                            {{ $product->category->title }}
                                        @else
                                            <em>Категория удалена</em>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($paginator->total(1) > $paginator->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
