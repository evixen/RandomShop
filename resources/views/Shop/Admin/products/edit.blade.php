@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('Shop.Admin.result_messages')

        @if($product->exists)
            <form method="post" action="{{ route('shop.admin.products.update', $product->id) }}">
                @method('PATCH')
        @else
            <form method="post" action="{{ route('shop.admin.products.store') }}">
        @endif

        @csrf

        <div class="row justify-content-center">
            <div class="col-md-9">
                @include('Shop.Admin.products.includes.product_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('Shop.Admin.products.includes.product_edit_add_col')
            </div>
        </div>
    </div>
@endsection
