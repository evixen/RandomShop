@extends('layouts.shop')

@section('title', $product->name)

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container my-5 product-one">
        <div class="row align-items-center justify-content-around mx-0">
            <div class="col-sm-6">
                <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="img">
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Имя товара
                    </div>
                    <div class="card-body">
                        <strong>{{ $product->name }}</strong>
                    </div>
                    <div class="card-header">
                        Описание товара
                    </div>
                    <div class="card-body">
                        {{ $product->details }}
                    </div>
                    <div class="card-header">
                        Цена: <strong class="product-server price ml-2">{{ $product->price }}</strong> руб.
                    </div>
                </div>
                <form action="{{ route('shop.cart.add') }}" method="post" class="mt-3">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="category" value="{{ $product->category->slug }}">
                    <button type="submit" class="btn btn-purple">Добавить в корзину</button>
                </form>
                @if (session()->has('success'))
                    <br>
                    <div class="col-sm-5 alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container see-also mb-4">
        <h3 class="h3 text-center">Товары этой категории</h3>
        <div class="row justify-content-around flex-wrap">
            @foreach ($others as $product)
                <div class="col-sm-3 mb-3 product-list">
                    <a href="{{ route('shop.product', [$product->category->slug, $product->slug]) }}">
                        <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="img" class="mx-auto">
                    </a>
                    <a href="{{ route('shop.product', [$product->category->slug, $product->slug]) }}">
                        <div class="product-name text-center">{{ $product->name }}</div>
                    </a>
                    <div class="product-price text-center">{{ $product->price }} руб.</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
