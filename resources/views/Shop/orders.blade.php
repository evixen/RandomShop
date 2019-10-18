@extends('layouts.shop')

@section('title')Ваши заказы@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="h3 my-4">Ваши заказы</h3>
        </div>
        <div class="row">
            @if($orders->isEmpty())
                <h3 class="h3 text-info">Вы еще не сделали ни одного заказа</h3>
            @endif
            @foreach($orders as $order)
                <div class="col-sm-4">
                    <div class="card border-info">
                        <div class="card-header">
                            Заказ <span class="ml-1 text-info">{{ $order->order_id }}</span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="card-title text-secondary">Дата:</i>
                                    <div>{{ $order->created_at }}</div>
                                </li>
                                <li class="list-group-item">
                                    <i class="card-title  text-secondary">Стоимость:</i>
                                    <div>{{ $order->price }} руб.</div>
                                </li>
                                <li class="list-group-item">
                                    <i class="card-title text-secondary">Товары:</i>
                                    @foreach($order->products as $product)
                                        <div>{{ $product->name }} x {{ $product->pivot->quantity }}</div>
                                    @endforeach
                                </li>
                                <li class="list-group-item">
                                    <i class="card-title text-secondary">Адресат:</i>
                                    <div>{{ $order->receiver_name }}</div>
                                </li>
                                <li class="list-group-item">
                                    <i class="card-title text-secondary">Адрес доставки:</i>
                                    <div>{{ $order->address }}</div>
                                </li>
                                <li class="list-group-item">
                                    <i class="card-title text-secondary">Номер телефона:</i>
                                    <div>{{ $order->phone }}</div>
                                </li>
                                @if($order->comment)
                                    <li class="list-group-item">
                                        <i class="card-title text-secondary">Комментарий:</i>
                                        <div>{{ $order->comment }}</div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
