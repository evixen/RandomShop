@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('Shop.Admin.result_messages')

        <form method="post" action="{{ route('shop.admin.orders.update', $order->id) }}">
            @method('PATCH')

            @csrf

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    @include('Shop.Admin.orders.includes.order_edit_main_col')
                </div>
                <div class="col-sm-4">
                    @include('Shop.Admin.orders.includes.order_edit_add_col')
                </div>
            </div>
        </form>
    </div>
@endsection
