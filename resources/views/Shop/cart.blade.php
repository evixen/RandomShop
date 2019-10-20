@extends('layouts.shop')

@section('title')Корзина товаров@endsection

@section('content')

    @include('Shop.result_messages');

    <div class="container-fluid" id="cart">
        @if(!ShoppingCart::isEmpty())
            <div class="row justify-content-around mx-0">

                {{-- Список товаров --}}
                <div class="col-sm-7">
                    @foreach(ShoppingCart::all() as $product)
                        <div class="row align-items-center" id="cart-item">
                            <div class="col-sm-3">
                                <a href="{{ route('shop.product', [$product->category, $product->slug]) }}">
                                    <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="img"
                                         class="img-thumbnail">
                                </a>
                            </div>
                            <div class="col-sm-3 product-name">
                                <a href="{{ route('shop.product', [$product->category, $product->slug]) }}">
                                    {{ $product->name }}
                                </a>
                            </div>
                            <div class="col-sm-2 mr-0">
                                <form action="{{ route('shop.cart.qty') }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <input value="{{ $product->rawId() }}"
                                           type="hidden"
                                           name="id"
                                           id="id">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-sm-7 p-0">
                                            <input class="form-control form-control-sm" type="text"
                                                   value="{{ $product->qty }}" id="qty" name="qty">
                                        </div>
                                        <div class="col-sm-4 p-0 ml-1">
                                            <label for="qty" class="col-form-label p-0">
                                                <button class="btn btn-sm btn-purple" type="submit">></button>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-2 product-price">
                                <span class="price">{{ $product->price * $product->qty}} руб.</span>
                            </div>
                            <div class="col-sm-1">
                                <form action="{{ route('shop.cart.delete', $product->rawId()) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-purple btn-sm">x
                                    </button>
                                </form>
                            </div>
                        </div><br><br>
                    @endforeach
                    <div class="row justify-content-start align-items-center">
                        <div class="col-sm-5" id="cart-total">
                            <h3 class="h3">
                                Итого: <span class="price">{{ ShoppingCart::totalPrice() }} руб.</span>
                            </h3>
                        </div>
                        <div class="col-sm-4" id="cart-clean">
                            <form action="{{ route('shop.cart.clean') }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-warning">Очистить корзину</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Форма заказа --}}
                <div class="col-sm-4" id="cart-form">
                    <form method="POST" action="{{ route('shop.cart.checkout') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">Оформление заказа</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="receiver_name"><span class="red">*</span> ФИО</label>
                                    <input type="text"
                                           class="form-control"
                                           id="receiver_name"
                                           name="receiver_name"
                                           @if(Auth::check() AND $lastOrder != false)
                                           value="{{ $lastOrder->receiver_name }}"
                                           @endif
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="email"><span class="red">*</span> E-mail</label>
                                    @if(Auth::check())
                                        <input type="text"
                                               class="form-control"
                                               id="email"
                                               name="email"
                                               value="{{ Auth::user()->email }}"
                                               readonly>
                                    @else
                                        <input type="text"
                                               class="form-control"
                                               id="email"
                                               name="email"
                                               required>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone"><span class="red">*</span> Телефон</label>
                                    <input type="text"
                                           class="form-control"
                                           id="phone"
                                           name="phone"
                                           @if(Auth::check() AND $lastOrder != false)
                                           value="{{ $lastOrder->phone }}"
                                           @endif
                                           required>
                                    <small class="form-text text-muted">10-12 цифр, пример: 375295553535</small>
                                </div>
                                <div class="form-group">
                                    <label for="phone"><span class="red">*</span> Адрес</label>
                                    <input type="text"
                                           class="form-control"
                                           id="address"
                                           name="address"
                                           @if(Auth::check() AND $lastOrder != false)
                                           value="{{ $lastOrder->address }}"
                                           @endif
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Комментарий</label>
                                    <textarea type="text"
                                              class="form-control"
                                              id="comment"
                                              name="comment"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-purple" id="cart-form-accept">
                            Оформить и оплатить заказ
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-sm-4" id="cart-empty"><h2>Товаров в корзине нет</h2></div>
                    <div class="col-sm-12">
                        <a href="{{ route('shop.main') }}" class="btn btn-purple">Вернуться на главную</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
