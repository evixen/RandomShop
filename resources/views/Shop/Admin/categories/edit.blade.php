@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('Shop.Admin.result_messages')

        @if($category->exists)
            <form method="post" action="{{ route('shop.admin.categories.update', $category->id) }}">
                @method('PATCH')
        @else
            <form method="post" action="{{ route('shop.admin.categories.store') }}">
        @endif

        @csrf

        <div class="row justify-content-center">
            <div class="col-md-9">
                @include('Shop.Admin.categories.includes.category_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('Shop.Admin.categories.includes.category_edit_add_col')
            </div>
        </div>
    </div>
@endsection
