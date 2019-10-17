@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('Shop.Admin.result_messages')

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Заказы в архиве</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Номер заказа</th>
                                <th>E-mail</th>
                                <th>Сумма заказа</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($archived as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        <a href="{{ route('shop.admin.orders.edit', $order->id) }}">
                                            {{ $order->order_id }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $order->email }}
                                    </td>
                                    <td>
                                        {{ $order->price }}
                                    </td>
                                    <td>
                                        <form method="get"
                                              action="{{ route('shop.admin.orders.restore', $order->id) }}">
                                            <input value="{{ $order->id }}"
                                                   type="hidden"
                                                   name="id"
                                                   id="id">
                                            <button type="submit" class="btn btn-sm btn-warning">восстановить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($archived->total(1) > $archived->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            {{ $archived->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
