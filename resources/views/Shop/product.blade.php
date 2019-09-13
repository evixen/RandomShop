@extends('layouts.shop')

@section('title', $product->name)

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

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="phone">
            </div>
            <div class="col-md-6">
                <div class="product-name">{{ $product->name }}</div>
                <br>
                <div class="product-price">{{ $product->price }} р.</div>
                <br>
                <div class="product-details">{{ $product->details }}</div>
                <br><br>
                <form action="{{ route('cart.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                </form>
            </div>
        </div>
    </div>
@endsection
