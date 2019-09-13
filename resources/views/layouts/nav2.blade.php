<nav class="navbar navbar-expand-md bg-light shadow-sm" id="second-navbar">
    <div class="container">
        <div class="row no-gutters">
            {{-- Logo --}}
            <div class="col-sm-2" id="snb-left">
                <a href="/"><img src="/img/logo.png" alt="" id="logo" class="navbar-brand img-fluid"></a>
            </div>
            <div class="col-sm-7" id="snb-center">
                <ul class="navbar-nav d-flex justify-content-around align-items-center flex-wrap">
                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle text-dark"
                                                     id="DropdownMenuLink-1" data-toggle="dropdown"
                                                     aria-haspopup="true" aria-expanded="false">ЭЛЕКТРОНИКА</a>
                        <div class="dropdown-menu shadow-sm" aria-labelledby="DropdownMenuLink-1">
                            <span class="dropdown-item">Телефония и связь</span>
                            <a class="dropdown-item" href="#">Мобильные телефоны</a>
                            <a class="dropdown-item" href="#">Проводные телефоны</a>

                            <span class="dropdown-item">Аудиотехника</span>
                            <a class="dropdown-item" href="#">MP3-плееры</a>
                            <a class="dropdown-item" href="#">Микрофоны</a>

                            <span class="dropdown-item">Телевидение и Видео</span>
                            <a class="dropdown-item" href="#">Телевизоры</a>
                            <a class="dropdown-item" href="#">Медиаплееры</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle text-dark"
                                                     id="DropdownMenuLink-2" data-toggle="dropdown"
                                                     aria-haspopup="true" aria-expanded="false">БЫТОВАЯ ТЕХНИКА</a>
                        <div class="dropdown-menu shadow-sm" aria-labelledby="DropdownMenuLink-2">
                            <span class="dropdown-item">Климатическая техника</span>
                            <a class="dropdown-item" href="#">Вентиляторы</a>
                            <a class="dropdown-item" href="#">Обогреватели</a>

                            <span class="dropdown-item">Крупногабаритная техника</span>
                            <a class="dropdown-item" href="#">Кухонные плиты</a>
                            <a class="dropdown-item" href="#">Холодильники</a>

                            <span class="dropdown-item">Подготовка и обработка продуктов</span>
                            <a class="dropdown-item" href="#">Блендеры</a>
                            <a class="dropdown-item" href="#">Кухонные весы</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle text-dark"
                                                     id="DropdownMenuLink-3" data-toggle="dropdown"
                                                     aria-haspopup="true" aria-expanded="false">КОМПЬЮТЕРЫ И
                            СЕТИ</a>
                        <div class="dropdown-menu shadow-sm" aria-labelledby="DropdownMenuLink-3">
                            <span class="dropdown-item">Ноутбуки</span>
                            <a class="dropdown-item" href="#">Ноутбуки</a>
                            <a class="dropdown-item" href="#">Сумки для ноутбуков</a>

                            <span class="dropdown-item">Компьютеры и комплектующие</span>
                            <a class="dropdown-item" href="#">Видеокарты</a>
                            <a class="dropdown-item" href="#">Жесткие диски</a>

                            <span class="dropdown-item">Периферия</span>
                            <a class="dropdown-item" href="#">Клавиатуры</a>
                            <a class="dropdown-item" href="#">Мыши</a>
                        </div>
                    </li>
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
