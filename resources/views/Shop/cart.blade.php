@extends('layouts.shop')

@section('content')

    @if (session()->has('success_message'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2 alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            @if(!ShoppingCart::isEmpty())
                <div class="col-md-4"><h2>Товаров в корзине: {{ ShoppingCart::countRows() }}</h2></div>
                <div class="row">
                    @foreach(ShoppingCart::all() as $product)
                        <div class="col-md-6">
                            <a href="{{ route('shop.product', $product->slug) }}">
                                <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="phone"
                                     style="width: 150px">
                            </a>
                            <a href="{{ route('shop.product', $product->slug) }}">
                                <div class="product-name">{{ $product->name }}</div>
                            </a>
                            <br>
                            <div class="product-price">{{ $product->price}} руб.</div>
                            <br>
                            <div class="product-details">{{ $product->rawId() }}</div>
                            <br>
                            <div class="">
                                <form action="{{ route('cart.delete', $product->rawId()) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-outline-secondary btn-sm">удалить</button>
                                </form>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-md-4"><h2>Товаров в корзине нет</h2></div>
            @endif
            <div class="row">
                <div class="col-md-2">
                    <span>Всего - {{ ShoppingCart::totalPrice() }} руб.</span>
                </div>
                <div class="col-md-3">
                    <form action="{{ route('cart.clean') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" class="btn btn-primary">Очистить корзину</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
