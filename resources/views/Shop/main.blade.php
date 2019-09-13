@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row justify-content-around flex-wrap">
            @foreach ($products as $product)
                <div class="col-md-3 product">
                    <a href="{{ route('shop.product', $product->slug) }}">
                        <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="phone"
                             style="width: 150px">
                    </a>
                    <a href="{{ route('shop.product', $product->slug) }}">
                        <div class="product-name">{{ $product->name }}</div>
                    </a>
                    <div class="product-price">{{ $product->price }} р.</div>
                    <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
