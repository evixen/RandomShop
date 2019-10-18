<nav class="navbar navbar-expand-md bg-light shadow-sm" id="second-navbar">
    <div class="container">
        <div class="row no-gutters">

            {{-- Logo --}}
            <div class="col-sm-2" id="snb-left">
                <a href="/"><img src="/img/logo.png" alt="" id="logo" class="navbar-brand img-fluid"></a>
            </div>

            {{-- Menu --}}
            <div class="col-sm-6" id="snb-center">
                <ul class="navbar-nav d-flex justify-content-around align-items-center flex-wrap">
                    @foreach($menu as $key1 => $value1)
                        <li class="nav-item dropdown">
                            <span class="nav-link dropdown-toggle text-dark pointer"
                                  id="DropdownMenuLink-1" data-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">{{ mb_strtoupper($key1) }}</span>
                            <div class="dropdown-menu shadow-sm" aria-labelledby="DropdownMenuLink-1">
                                @foreach($value1 as $key2 => $value2)
                                    <span class="dropdown-item">{{ $key2 }}</span>
                                    @foreach($value2 as $key3)
                                        <a class="dropdown-item"
                                           href="{{ route('shop.category', Str::slug($key3)) }}">{{ $key3 }}</a>
                                    @endforeach
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Icons --}}
            <div class="col-sm-3 ml-auto" id="snb-right">
                <div class="row justify-content-end flex-nowrap pt-3">

                    {{-- Profile --}}
                    <div class="col-sm-4 dropdown noclose profile">
                        @include('layouts.includes.shop-user')
                    </div>

                    {{-- Cart --}}
                    <div class="col-sm-3 p-0 cart">
                        <a href="{{ route('shop.cart.index') }}" class="text-dark text-decoration-none">
                            <i class="material-icons">shopping_cart</i>
                            <span class="count">
                                @if(!ShoppingCart::isEmpty())
                                    {{ ShoppingCart::countRows() }}
                                @endif
                            </span>
                        </a>
                    </div>

                    {{-- Search --}}
                    <div class="col-sm-3 dropdown noclose search">
                        @include('layouts.includes.shop-search')
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
