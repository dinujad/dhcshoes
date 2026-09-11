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
                    <span class="cat-round__media">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                            <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                            <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                        </svg>
                        <span class="cat-round__all-label">View all<br>categories</span>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <section class="mark-banner" id="range">
        <div class="mark-bg" aria-hidden="true">
            <img src="{{ asset('images/products/p6.png') }}" alt="">
        </div>
        <div class="mark-veil" aria-hidden="true"></div>

        <div class="wrap mark-inner">
            <div class="mark-copy">
                <p class="mark-kicker">DHC collection 2026</p>
                <h2 class="mark-word" aria-label="Footwear">
                    <span class="mark-clip"><em>FOOT</em></span>
                    <span class="mark-clip"><em class="is-red">WEAR</em></span>
                </h2>
                <p class="mark-tag">Street sneakers from Mirigama</p>
                <a class="btn btn-gold" href="{{ route('shop') }}">Shop the drop →</a>
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
                    <h3>Up to<br>50% off</h3>
                    <span class="promo-sub">On selected items</span>
                    <span class="btn btn-gold">Shop now</span>
                </div>
                <img src="{{ asset('images/products/p4.png') }}" alt="Sale sneakers">
            </a>
            <a class="promo-card promo-card--cream" href="{{ route('shop') }}">
                <div>
                    <p>New season</p>
                    <h3>New styles<br>new you</h3>
                    <span class="promo-sub">Explore latest collection</span>
                    <span class="btn btn-dark">Explore now</span>
                </div>
                <img src="{{ asset('images/products/p7.png') }}" alt="New season sneakers">
            </a>
            <a class="promo-card promo-card--dark" href="{{ route('shop', ['category' => 'sale']) }}">
                <div>
                    <p>Student discount</p>
                    <h3>Extra 10%<br>off</h3>
                    <span class="promo-sub">On all orders</span>
                    <span class="btn btn-gold">Shop now</span>
                    <span class="promo-note">*Valid on student ID</span>
                </div>
                <img src="{{ asset('images/products/p2.png') }}" alt="Offer sneakers">
            </a>
        </div>
    </section>

    <section class="section section-tight" id="new-arrivals">
        <div class="wrap">
            <div class="section-head">
                <h2 class="section-title">New arrivals</h2>
                <a class="section-link" href="{{ route('shop') }}">Shop the drop →</a>
            </div>
            <div class="product-grid product-grid--4">
                @foreach ($arrivals as $product)
                    @include('store.partials.product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>

    <section class="trust-bar">
        <div class="wrap trust-grid">
            <div class="trust-item">
                <span class="trust-ico" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1.5" y="7" width="13" height="9" rx="1.5"/><path d="M14.5 10h3.2L21 13.2V16h-6.5v-6z"/><circle cx="6" cy="18.2" r="1.7"/><circle cx="17.5" cy="18.2" r="1.7"/></svg>
                </span>
                <div>
                    <strong>Free shipping</strong>
                    <span>On all orders above Rs. 999</span>
                </div>
            </div>
            <div class="trust-item">
                <span class="trust-ico" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 2.6-6.3"/><path d="M3 4.5V9h4.5"/><path d="M12 8v5l3 2"/></svg>
                </span>
                <div>
                    <strong>7 days return</strong>
                    <span>Hassle free return &amp; exchange</span>
                </div>
            </div>
            <div class="trust-item">
                <span class="trust-ico" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/><path d="M6 15h4"/></svg>
                </span>
                <div>
                    <strong>Secure payment</strong>
                    <span>100% safe &amp; secure payments</span>
                </div>
            </div>
            <div class="trust-item">
                <span class="trust-ico" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="5"/><path d="M8.4 12.6 7 21l5-2.6L17 21l-1.4-8.4"/><path d="M10.2 8.1l1.1 1.1L13.8 7.4"/></svg>
                </span>
                <div>
                    <strong>Quality guaranteed</strong>
                    <span>Always premium quality</span>
                </div>
            </div>
            <div class="trust-item">
                <span class="trust-ico" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 13.5v-2a7.5 7.5 0 0 1 15 0v2"/><rect x="2.5" y="13" width="5" height="6.5" rx="2"/><rect x="16.5" y="13" width="5" height="6.5" rx="2"/><path d="M19 19.5a3.2 3.2 0 0 1-3.2 3.2H12"/></svg>
                </span>
                <div>
                    <strong>Customer support</strong>
                    <span>24/7 support available</span>
                </div>
            </div>
        </div>
    </section>
@endsection
