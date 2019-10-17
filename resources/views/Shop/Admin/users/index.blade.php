@extends('layouts.admin')

@section('content')
    <div class="container">

        @include('Shop.Admin.result_messages')

        @foreach($usersByRole as $usersArray)
            @foreach($usersArray as $title => $users)
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">{{ $title }}</div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>E-mail</th>
                                        <th>Роли</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    {{ $role->name }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($title == 'Администраторы')
                                                    <form method="post"
                                                          action="{{ route('shop.admin.users.deleteRole') }}">
                                                        @method('PATCH')
                                                        @csrf

                                                        <input value="{{ $user->id }}"
                                                               type="hidden"
                                                               name="id"
                                                               id="id">

                                                        <input value="Admin"
                                                               type="hidden"
                                                               name="role"
                                                               id="role">

                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger">
                                                            - админ
                                                        </button>
                                                    </form>
                                                @elseif($title == 'Менеджеры')
                                                    <div class="row">
                                                        <div class="px-1">
                                                            <form method="post"
                                                                  action="{{ route('shop.admin.users.addRole') }}">
                                                                @csrf

                                                                <input value="{{ $user->id }}"
                                                                       type="hidden"
                                                                       name="id"
                                                                       id="id">

                                                                <input value="Admin"
                                                                       type="hidden"
                                                                       name="role"
                                                                       id="role">

                                                                <button type="submit"
                                                                        class="btn btn-sm btn-success">
                                                                    + админ
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="px-1">
                                                            <form method="post"
                                                                  action="{{ route('shop.admin.users.deleteRole') }}">
                                                                @method('PATCH')
                                                                @csrf

                                                                <input value="{{ $user->id }}"
                                                                       type="hidden"
                                                                       name="id"
                                                                       id="id">

                                                                <input value="Manager"
                                                                       type="hidden"
                                                                       name="role"
                                                                       id="role">

                                                                <button type="submit"
                                                                        class="btn btn-sm btn-danger">
                                                                    - менеджер
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="px-1">
                                                            <form method="post"
                                                                  action="{{ route('shop.admin.users.addRole') }}">
                                                                @csrf

                                                                <input value="{{ $user->id }}"
                                                                       type="hidden"
                                                                       name="id"
                                                                       id="id">

                                                                <input value="Admin"
                                                                       type="hidden"
                                                                       name="role"
                                                                       id="role">

                                                                <button type="submit"
                                                                        class="btn btn-sm btn-success">
                                                                    + админ
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="px-1">
                                                            <form method="post"
                                                                  action="{{ route('shop.admin.users.addRole') }}">
                                                                @csrf

                                                                <input value="{{ $user->id }}"
                                                                       type="hidden"
                                                                       name="id"
                                                                       id="id">

                                                                <input value="Manager"
                                                                       type="hidden"
                                                                       name="role"
                                                                       id="role">

                                                                <button type="submit"
                                                                        class="btn btn-sm btn-primary">
                                                                    + менеджер
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        @endforeach
    </div>
@endsection
