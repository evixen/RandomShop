@extends('layouts.shop')

@section('content')

    @include('Shop.result_messages');

    <div class="container-fluid" id="cart">
        <div class="row">
            @if(!ShoppingCart::isEmpty())
                <div class="row justify-content-center">
                    <div class="col-sm-4" id="cart-form">
                        <form method="POST" action="{{ route('shop.cart.checkout') }}">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="card-header">Оформление заказа</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="receiver_name"><span class="red">*</span> ФИО</label>
                                        <input type="text"
                                               class="form-control"
                                               id="receiver_name"
                                               name="receiver_name"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><span class="red">*</span> E-mail</label>
                                        @if(Auth::user())
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
                                               required>
                                        <small class="form-text text-muted">10-12 цифр, пример: 375295553535</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"><span class="red">*</span> Адрес</label>
                                        <input type="text"
                                               class="form-control"
                                               id="address"
                                               name="address"
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
                                Оформить заказ
                            </button>
                        </form>
                    </div>

                    <div class="col-sm-7">
                        @foreach(ShoppingCart::all() as $product)
                            <div class="row align-items-center" id="cart-item">
                                <div class="col-sm-3">
                                    <a href="{{ route('shop.product', [$product->category, $product->slug]) }}">
                                        <img src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt="phone"
                                             style="max-width: 120px" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-sm-3 product-name">
                                    <a href="{{ route('shop.product', [$product->category, $product->slug]) }}">
                                        {{ $product->name }}
                                    </a>
                                </div>
                                <div class="col-sm-2 count">
                                    count
                                </div>
                                <div class="col-sm-2 product-price">
                                    <span class="price">{{ $product->price}} руб.</span>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{ route('shop.cart.delete', $product->rawId()) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">удалить
                                        </button>
                                    </form>
                                </div>
                            </div><br><br>
                        @endforeach
                        <div class="row justify-content-end">
                            <div class="col-sm-4" id="cart-total">
                                <h3 class="h3">
                                    Итого: <span class="price">{{ ShoppingCart::totalPrice() }} руб.</span>
                                </h3>
                            </div>
                            <div class="col-sm-4" id="cart-clean">
                                <form action="{{ route('shop.cart.clean') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-warning">Очистить корзину</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4" id="cart-empty"><h2>Товаров в корзине нет</h2></div>
            @endif
        </div>
    </div>
@endsection
