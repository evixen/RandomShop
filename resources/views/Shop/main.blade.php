@extends('layouts.shop')

@section('content')
    <div class="container p-0">
        @foreach($productsByCategory as $catId => $products)
            <div class="row">
                <h3 class="h3 pl-4">{{ $categories[$catId] }}</h3>
                <ul id="flexiselDemo{{ $catId }}">
                    @foreach ($products as $product)
                        <li>
                            <a href="{{ route('shop.product', [$product->category->slug, $product->slug]) }}">
                                <img class="product-img"
                                     src="{{ asset('/img/products/' . $product->slug . '.jpg') }}" alt=""/>
                            </a>
                            <a href="{{ route('shop.product', [$product->category->slug, $product->slug]) }}">
                                <div class="product-name">{{ $product->name }}</div>
                            </a>
                            <div class="product-price">{{ $product->price }} руб.</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>


    <script type="text/javascript">

        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                visibleItems: 4,
                itemsToScroll: 1,
                autoPlay: {
                    enable: true,
                    interval: 10000,
                    pauseOnHover: true
                }
            });

            $("#flexiselDemo2").flexisel({
                visibleItems: 4,
                itemsToScroll: 1,
                autoPlay: {
                    enable: true,
                    interval: 10000,
                    pauseOnHover: true
                }
            });

            $("#flexiselDemo3").flexisel({
                visibleItems: 4,
                itemsToScroll: 1,
                autoPlay: {
                    enable: true,
                    interval: 10000,
                    pauseOnHover: true
                }
            });

        });

        $(document).ready(function () {

            /** Twitter **/
            !function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");

            /** Google+ **/
            (function () {
                var po = document.createElement('script');
                po.type = 'text/javascript';
                po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(po, s);
            })();

            $('.nbs-social-twitter').tipsy();

        });

    </script>
@endsection
