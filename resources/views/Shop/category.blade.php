@extends('layouts.shop')

@section('content')
    <div class="container">

        <div class="row sort">
            <div class="col-sm-2">
                <strong>Сортировка цены по:</strong>
            </div>
            <div class="col-sm-1">
                <a href="{{ route('shop.category', [$category, 'sort' => 'low_high']) }}">возрастанию</a>
            </div>
            <div class="col-sm-1">
                <a href="{{ route('shop.category', [$category, 'sort' => 'high_low']) }}">убыванию</a>
            </div>
        </div>
        <br><br>

        <div class="row justify-content-around flex-wrap">
            @foreach ($products as $product)
                <div class="col-sm-3 product">
                    <a href="{{ route('shop.product', [$product->category->slug, $product->slug]) }}">
                        <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="phone"
                             style="width: 150px">
                    </a>
                    <a href="{{ route('shop.product', [$product->category->slug, $product->slug]) }}">
                        <div class="product-name">{{ $product->name }}</div>
                    </a>
                    <div class="product-price">{{ $product->price }} руб.</div>
                    <div class="product-price">{{ $product->category->title }}</div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
