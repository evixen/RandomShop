@extends('layouts.shop')

@section('content')

    @include('Shop.result_messages')

    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="cart-empty"><h2>Ошибка при совершении платежа!</h2></div>
            <div class="col-sm-12">
                <a href="{{ route('shop.main') }}" class="btn btn-purple">Вернуться на главную</a>
            </div>
        </div>
    </div>
@endsection
