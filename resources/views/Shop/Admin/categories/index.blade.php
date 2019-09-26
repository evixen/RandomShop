@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('shop.admin.categories.create') }}" class="btn btn-primary">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('shop.admin.categories.edit', $category->id) }}">
                                            {{ $category->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($category->parent_id != 0)
                                            {{ $category->parent->title }}
                                        @else
                                            <em style="color: #ccc">Нет</em>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @if($paginator->total(1) > $paginator->count())
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
            {{-- $menu приходит из AppServiceProvider --}}
                <ul class="d-flex flex-row justify-content-between flex-wrap" id="categories-view">
                    @foreach($menu as $key1 => $value1)
                        <li class="categories-family">
                            <div class="category level-1">{{ $key1 }}</div>
                            @foreach($value1 as $key2 => $value2)
                                <div class="category level-2">{{ $key2 }}</div>
                                @foreach($value2 as $key3)
                                    <div class="category level-3">{{ $key3 }}</div>
                                @endforeach
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
