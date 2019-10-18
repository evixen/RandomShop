@extends('layouts.shop')

@section('title')
{{ $categorySlug }}
@endsection

@section('content')
    <div class="container">

        <div class="row sort justify-content-end">
            <div class="col-sm-2">
                <strong>Сортировка цены по:</strong>
            </div>
            <div class="col-sm-1">
                <a href="{{ route('shop.category', [$categorySlug, 'sort' => 'low_high']) }}">возрастанию</a>
            </div>
            <div class="col-sm-1">
                <a href="{{ route('shop.category', [$categorySlug, 'sort' => 'high_low']) }}">убыванию</a>
            </div>
        </div>

        <div class="row justify-content-around flex-wrap mt-5">
            @foreach ($products as $product)
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
