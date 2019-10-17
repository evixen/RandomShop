@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('Shop.Admin.result_messages')

        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">Статистика</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="card-title text-secondary">Товаров на сайте: </i><strong
                                    class="purple">{{ $productsCount }}</strong>
                            </li>
                            <li class="list-group-item">
                                <i class="card-title text-secondary">Зарегистрированных
                                    пользователей: </i><strong class="purple">{{ $usersCount }}</strong>
                            </li>
                            <li class="list-group-item">
                                <i class="card-title text-secondary">Заказов
                                    сделано: </i><strong class="purple">{{ $ordersCount }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
