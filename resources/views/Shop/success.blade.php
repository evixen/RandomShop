@extends('layouts.shop')

@section('content')

    @include('Shop.result_messages')

    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="cart-empty"><h2>Платёж успешно совершен!</h2></div>
            <div class="col-sm-3">
                <a href="{{ route('shop.main') }}" class="btn btn-purple">Вернуться на главную</a>
            </div>
            <div class="col-sm-3">
                <form action="{{ route('shop.cart.clean') }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-warning">Очистить корзину</button>
                </form>
            </div>
        </div>
    </div>
@endsection
