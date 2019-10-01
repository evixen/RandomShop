@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('Shop.Admin.result_messages')

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h3 class="h3">Категории в архиве</h3>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('shop.admin.categories.edit', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if(!empty($category->parent->title))
                                            {{ $category->parent->title }}
                                        @else
                                            <em style="color: #ccc">Нет</em>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="get"
                                              action="{{ route('shop.admin.categories.restore', $category->id) }}">
                                            <input value="{{ $category->id }}"
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
                @if($deleted->total(1) > $deleted->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $deleted->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
