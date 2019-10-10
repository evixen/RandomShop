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
                <br>
                <form action="{{ route('shop.cart.add') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="slug" value="{{ $product->slug }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="category" value="{{ $product->category->slug }}">
                    <button type="submit" class="btn btn-purple">Добавить в корзину</button>
                </form>
                @if (session()->has('success_message'))
                    <br>
                    <div class="col-sm-5 alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
