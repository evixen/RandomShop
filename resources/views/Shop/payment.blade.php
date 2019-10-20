@extends('layouts.shop')

@section('content')

    @include('Shop.result_messages')

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        Способ оплаты:
                    </div>
                    <div class="card-body pl-5">
                        <input class="form-check-input" type="radio" id="pay1" checked>
                        <label for="pay1" class="form-check-label">WebMoney</label>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="https://merchant.webmoney.ru/lmi/payment_utf.asp"
                              accept-charset="utf-8">
                            {{ csrf_field() }}
                            <input type="hidden" name="LMI_PAYMENT_AMOUNT" value="{{ ShoppingCart::total() }}">
                            <input type="hidden" name="LMI_PAYMENT_DESC_BASE64" value="Тестовый платеж по счету">
                            <input type="hidden" name="LMI_PAYEE_PURSE" value="Z325841803979">
                            <input type="hidden" name="LMI_SIM_MODE" value="0">
                            <input type="hidden" name="LMI_PAYMENT_NO" value="{{ $id }}">
                            <button type="submit" class="btn btn-purple">Оплатить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
