<nav class="navbar navbar-expand-md bg-light shadow-sm" id="second-navbar">
    <div class="container">
        <div class="row no-gutters">
            {{-- Logo --}}
            <div class="col-sm-2" id="snb-left">
                <a href="/"><img src="/img/logo.png" alt="" id="logo" class="navbar-brand img-fluid"></a>
            </div>

            <div class="col-sm-7" id="snb-center">
                <ul class="navbar-nav d-flex justify-content-around align-items-center flex-wrap">
                    @foreach($menu as $key1 => $value1)
                        <li class="nav-item dropdown"><span class="nav-link dropdown-toggle text-dark pointer"
                                                            id="DropdownMenuLink-1" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">{{ $key1 }}</span>
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


            <div class="col-sm-3" id="snb-right">
                <ul class="navbar-nav d-flex justify-content-end align-items-center flex-nowrap">
                    <li class="nav-item"><a href="#" class="nav-link text-dark">
                            <img src="https://img.icons8.com/material/24/000000/search.png" class="icon-prop">
                        </a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark">
                            <img src="https://img.icons8.com/ios/50/000000/user.png" class="icon-prop">
                        </a></li>
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link text-dark">
                            <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart.png"
                                 class="icon-prop">
                            @if(!ShoppingCart::isEmpty())
                                <span class="">{{ ShoppingCart::countRows() }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
