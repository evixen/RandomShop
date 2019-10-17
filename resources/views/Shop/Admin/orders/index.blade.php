@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('Shop.Admin.result_messages')

        <nav class="navbar navbar-light bg-faded">
            <a href="{{ route('shop.admin.orders.archived') }}" class="btn btn-secondary">Показать архивные</a>
        </nav>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Непроверенные заказы</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Номер заказа</th>
                                <th>E-mail</th>
                                <th>Сумма заказа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unchecked as $order)
                                <tr>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('shop.admin.orders.edit', $order->id) }}">
                                            {{ $order->order_id}}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $order->email}}
                                    </td>
                                    <td>
                                        {{ $order->price }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($unchecked->total(1) > $unchecked->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $unchecked->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Ожидающие доставки</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Номер заказа</th>
                                <th>E-mail</th>
                                <th>Сумма заказа</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($checked as $order)
                                <tr>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('shop.admin.orders.edit', $order->id) }}">
                                            {{ $order->order_id}}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $order->email }}
                                    </td>
                                    <td>
                                        {{ $order->price }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($checked->total(1) > $checked->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $checked->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
