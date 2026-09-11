<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta ?? 'DHC Footwear Store, Mirigama, Sri Lanka 11200. Delivery and in-store shopping. WhatsApp +94 76 335 1580.' }}">
    <title>@yield('title', 'DHC Footwear Store')</title>
    <link rel="icon" href="{{ asset('images/products/logo-circle.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/store.css') }}?v=logo-red">
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>

    @if (session('status'))
        <div class="flash">{{ session('status') }}</div>
    @endif

    <div class="promo-bar">
        <div class="wrap promo-bar__inner">
            <span>100% recommend · Delivery · In-store shopping · Always open</span>
            <a class="promo-cta" href="https://wa.me/94763351580" target="_blank" rel="noopener">WhatsApp now →</a>
        </div>
    </div>

    <header class="site-header">
        <div class="wrap nav" id="siteNav">
            <a class="brand" href="{{ route('home') }}">
                <img class="brand-logo" src="{{ asset('images/products/logo-circle.png') }}" alt="DHC Footwear Store">
            </a>

            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a></li>
                <li><a href="{{ route('shop', ['category' => 'men']) }}" class="{{ request('category') === 'men' ? 'is-active' : '' }}">Men</a></li>
                <li><a href="{{ route('shop', ['category' => 'women']) }}" class="{{ request('category') === 'women' ? 'is-active' : '' }}">Women</a></li>
                <li><a href="{{ route('shop', ['category' => 'street']) }}" class="{{ request('category') === 'street' ? 'is-active' : '' }}">Street</a></li>
                <li><a href="{{ route('shop') }}" class="{{ request()->routeIs('shop') && ! request('category') ? 'is-active' : '' }}">Collections</a></li>
                <li><a href="{{ route('shop', ['category' => 'sale']) }}" class="{{ request('category') === 'sale' ? 'is-active' : '' }}">Offers</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">About us</a></li>
            </ul>

            <div class="nav-tools">
                <form class="nav-search" action="{{ route('shop') }}" method="get">
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Search" aria-label="Search">
                    <button type="submit" aria-label="Search">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
                    </button>
                </form>
                <a class="icon-btn" href="{{ route('about') }}" aria-label="Account">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="8" r="3.2"/><path d="M5 19c1.6-3 4.1-4.5 7-4.5S17.4 16 19 19"/></svg>
                </a>
                <a class="icon-btn" href="{{ route('shop') }}" aria-label="Bag">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M6 8h12l-1 12H7L6 8z"/><path d="M9 8V7a3 3 0 0 1 6 0v1"/></svg>
                    @if ($bagCount = count(session('bag', [])))
                        <span class="bag-count">{{ $bagCount }}</span>
                    @endif
                </a>
                <button class="nav-toggle" id="navToggle" type="button" aria-label="Open menu"><span></span></button>
            </div>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    @include('store.partials.newsletter')

    <footer class="site-footer">
        <div class="wrap footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('images/products/logo-circle.png') }}" alt="DHC Footwear Store">
                <p>DHC Footwear Store — delivery and in-store shopping from Mirigama, Sri Lanka. 100% recommend from 5 reviews.</p>
                <div class="socials">
                    <a href="https://www.facebook.com/share/1EVZEaSvpK/?mibextid=wwXIfr" target="_blank" rel="noopener">Facebook</a>
                    <a href="https://wa.me/94763351580" target="_blank" rel="noopener">WhatsApp</a>
                    <a href="mailto:dhcshoe@gmail.com">Email</a>
                </div>
            </div>
            <div>
                <h4>Quick links</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('shop', ['category' => 'men']) }}">Men</a>
                <a href="{{ route('shop', ['category' => 'women']) }}">Women</a>
                <a href="{{ route('shop', ['category' => 'street']) }}">Street</a>
                <a href="{{ route('shop', ['category' => 'sale']) }}">Offers</a>
            </div>
            <div>
                <h4>Customer service</h4>
                <a href="{{ route('about') }}">FAQs</a>
                <a href="{{ route('about') }}">Shipping policy</a>
                <a href="{{ route('about') }}">Return & exchange</a>
                <a href="{{ route('about') }}">Size guide</a>
            </div>
            <div>
                <h4>Information</h4>
                <a href="{{ route('about') }}">About us</a>
                <a href="{{ route('about') }}">Our story</a>
                <a href="tel:+94763351580">+94 76 335 1580</a>
                <a href="mailto:dhcshoe@gmail.com">dhcshoe@gmail.com</a>
            </div>
            <div>
                <h4>Contact us</h4>
                <p>Mirigama, Sri Lanka</p>
                <p>11200</p>
                <p>Delivery · In-store shopping</p>
                <p>Always open</p>
            </div>
        </div>
        <div class="wrap legal">© {{ date('Y') }} DHC Footwear Store. All rights reserved.</div>
    </footer>

    <script>
        const nav = document.getElementById('siteNav');
        document.getElementById('navToggle')?.addEventListener('click', () => nav.classList.toggle('is-open'));
    </script>
    @stack('scripts')
</body>
</html>
