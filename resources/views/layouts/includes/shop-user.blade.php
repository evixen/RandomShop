<a href="#"
   class="text-dark dropdown-toggle"
   id="DropdownMenuUser"
   data-toggle="dropdown"
   aria-haspopup="true"
   aria-expanded="false">
    <i class="material-icons">person</i>
</a>

<div class="dropdown-menu p-3 user-dropdown" aria-labelledby="DropdownMenuUser">
    @guest

        {{-- Выпадающее меню гостя --}}

        <div class="h6" align="center">АВТОРИЗАЦИЯ</div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register" role="tab"
                   aria-controls="register"
                   aria-selected="true">Регистрация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                   aria-selected="false">Вход</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                <div class="px-2 py-3" style="max-width: 240px;">
                    <p>
                        Создание учетной записи поможет делать следующие покупки быстрее (не надо будет снова вводить
                        адрес
                        и контактную информацию), а также видеть заказы, сделанные ранее.
                    </p>
                    @if (Route::has('register'))
                        <button type="submit" class="btn btn-primary">
                            <a class="text-light" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                        </button>
                    @endif
                </div>
            </div>

            <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form method="POST" action="{{ route('login') }}" class="pt-3">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('messages.E-Mail Address') }}</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('messages.Password') }}</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('messages.Remember me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">{{ __('messages.Sign in') }}</button>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="col-sm-12 pt-2">
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    {{ __('messages.Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    @else

        {{-- Выпадающее меню пользователя --}}

        {{ Auth::user()->name }}

        <div class="dropdown-divider"></div>
        <div class="row flex-column">
            @php $userRoles = Auth::user()->roles->pluck('name'); @endphp
            @if($userRoles->contains('Admin') OR $userRoles->contains('Manager'))
                <div class="col-sm-12">
                    <a href="{{ route('shop.admin.main') }}">Админка</a>
                </div>
            @endif
            <div class="col-sm-12">
                <a href="{{ route('shop.orders') }}">Ваши заказы</a>
            </div>
            <div class="col-sm-12">
                <a class="" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('messages.Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    @endauth
</div>

