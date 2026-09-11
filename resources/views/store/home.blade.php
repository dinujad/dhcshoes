@extends('layouts.store')

@section('content')
    <section class="hero">
        <div class="hero-bg" aria-hidden="true">
            <video class="hero-video" autoplay muted loop playsinline preload="auto">
                <source src="{{ asset('videos/dhc-hero.mp4') }}?v=2" type="video/mp4">
            </video>
        </div>

        <div class="wrap hero-inner">
            <div class="hero-copy">
                <p class="hero-kicker">New collection 2026</p>
                <h1>Step into<br>comfort.<br><span>Walk in style.</span></h1>
                <p class="lead">Discover premium footwear that defines comfort, quality and style — made just for you.</p>
                <div class="hero-cta">
                    <a class="btn btn-gold" href="{{ route('shop') }}">Shop now →</a>
                    <a class="btn btn-outline" href="{{ route('shop', ['category' => 'street']) }}">Explore collection</a>
                </div>
            </div>

            <div class="hero-visual" aria-hidden="true"></div>

            <ul class="hero-points">
                <li>
                    <span class="hero-ico" aria-hidden="true"></span>
                    <div>
                        <strong>Premium quality</strong>
                        <span>Finest materials for maximum comfort</span>
                    </div>
                </li>
                <li>
                    <span class="hero-ico" aria-hidden="true"></span>
                    <div>
                        <strong>Trending styles</strong>
                        <span>Stay ahead with the latest collections</span>
                    </div>
                </li>
                <li>
                    <span class="hero-ico" aria-hidden="true"></span>
                    <div>
                        <strong>Easy returns</strong>
                        <span>Hassle-free size exchange, 38–43</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="section" id="categories">
        <div class="wrap">
            <div class="cat-row">
                @foreach ($categories as $category)
                    <a class="cat-round" href="{{ route('shop', ['category' => $category['slug']]) }}">
                        <span class="cat-round__media">
                            <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}">
                        </span>
                        <h3>{{ $category['name'] }}</h3>
                        <p>{{ $category['caption'] }}</p>
                    </a>
                @endforeach
                <a class="cat-round cat-round--all" href="{{ route('shop') }}">
                    <span class="cat-round__media">+</span>
                    <h3>View all</h3>
                    <p>Categories</p>
                </a>
            </div>
        </div>
    </section>

    <section class="section section-tight" id="featured">
        <div class="wrap">
            <div class="section-head">
                <h2 class="section-title">Best sellers</h2>
                <a class="section-link" href="{{ route('shop') }}">View all products →</a>
            </div>
            <div class="product-grid">
                @foreach ($featured as $product)
                    @include('store.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-tight">
        <div class="wrap promo-grid">
            <a class="promo-card promo-card--dark" href="{{ route('shop', ['category' => 'sale']) }}">
                <div>
                    <p>Exclusive offer</p>
                    <h3>Up to 50% off<br>on selected items</h3>
                    <span class="btn btn-gold">Shop now</span>
                </div>
                <img src="{{ asset('images/products/p4.png') }}" alt="Sale sneakers">
            </a>
            <a class="promo-card promo-card--cream" href="{{ route('shop') }}">
                <div>
                    <p>New season</p>
                    <h3>New styles<br>new you</h3>
                    <span class="btn btn-dark">Explore now</span>
                </div>
                <img src="{{ asset('images/products/p7.png') }}" alt="New season sneakers">
            </a>
            <a class="promo-card promo-card--dark" href="{{ route('shop', ['category' => 'sale']) }}">
                <div>
                    <p>Student discount</p>
                    <h3>Extra 10% off<br>on all orders</h3>
                    <span class="btn btn-gold">Shop now</span>
                </div>
                <img src="{{ asset('images/products/p2.png') }}" alt="Offer sneakers">
            </a>
        </div>
    </section>

    <section class="trust-bar">
        <div class="wrap trust-grid">
            <div>
                <strong>Delivery</strong>
                <span>Island-wide from Mirigama</span>
            </div>
            <div>
                <strong>In-store shopping</strong>
                <span>Always open</span>
            </div>
            <div>
                <strong>100% recommend</strong>
                <span>5 customer reviews</span>
            </div>
            <div>
                <strong>WhatsApp</strong>
                <span>+94 76 335 1580</span>
            </div>
            <div>
                <strong>Email</strong>
                <span>dhcshoe@gmail.com</span>
            </div>
        </div>
    </section>
@endsection
