@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('Shop.Admin.result_messages')

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h3 class="h3">Товары в архиве</h3>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Товар</th>
                                <th>Категория</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted as $product)
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
                                    <td>
                                        <form method="get"
                                              action="{{ route('shop.admin.products.restore', $product->id) }}">
                                            <input value="{{ $product->id }}"
                                                   type="hidden"
                                                   name="id"
                                                   id="id">
                                            <button type="submit" class="btn btn-sm btn-warning">восстановить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($deleted->total(1) > $deleted->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $deleted->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
