@extends('layouts.store')
@section('title', $product['name'].' | DHC Footwear Store')

@php
    $stars = str_repeat('★', (int) round($product['rating'])) . str_repeat('☆', 5 - (int) round($product['rating']));
@endphp

@section('content')
    <div class="wrap pdp">
        <div class="gallery">
            <div class="thumbs" id="thumbs">
                @foreach ($product['gallery'] as $index => $image)
                    <button type="button" class="{{ $index === 0 ? 'is-on' : '' }}" data-src="{{ $image }}">
                        <img src="{{ $image }}" alt="">
                    </button>
                @endforeach
            </div>
            <div class="main-shot">
                <img id="mainShot" src="{{ $product['gallery'][0] }}" alt="{{ $product['name'] }}">
            </div>
        </div>

        <div class="product-info">
            <p class="crumbs">
                <a href="{{ route('home') }}">Home</a> /
                <a href="{{ route('shop') }}">Shop</a> /
                <a href="{{ route('shop', ['category' => $product['category']]) }}">{{ ucfirst($product['category']) }}</a> /
                {{ $product['name'] }}
            </p>

            @if (!empty($product['badge']))
                <p class="kicker-red">{{ $product['badge'] }}</p>
            @endif

            <h1>{{ $product['name'] }}</h1>
            <p class="price">
                @if (!empty($product['compare_at']) && $product['compare_at'] > $product['price'])
                    <s>Rs. {{ number_format($product['compare_at']) }}</s>
                @endif
                Rs. {{ number_format($product['price']) }}
            </p>
            <div class="rating">
                <span class="stars"><span class="on">{{ $stars }}</span></span>
                <span>({{ $product['reviews'] }})</span>
            </div>
            <p class="lead">{{ $product['description'] }}</p>

            <form method="post" action="{{ route('bag.add') }}">
                @csrf
                <input type="hidden" name="slug" value="{{ $product['slug'] }}">

                <label class="option-label">Color</label>
                <div class="swatches">
                    @foreach ($product['colors'] as $index => $color)
                        <label>
                            <input type="radio" name="color" value="{{ $color['name'] }}" {{ $index === 0 ? 'checked' : '' }} hidden>
                            <span class="swatch {{ $index === 0 ? 'is-on' : '' }}" style="background: {{ $color['hex'] }}" title="{{ $color['name'] }}"></span>
                        </label>
                    @endforeach
                </div>

                <label class="option-label">Size</label>
                <div class="sizes">
                    @foreach ($product['sizes'] as $index => $size)
                        <label>
                            <input type="radio" name="size" value="{{ $size }}" {{ $index === 0 ? 'checked' : '' }} hidden>
                            <span class="size-opt {{ $index === 0 ? 'is-on' : '' }}">{{ $size }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="product-actions">
                    <button class="btn btn-gold btn-block" type="submit">Add to cart — Rs. {{ number_format($product['price']) }}</button>
                    <button class="btn btn-outline-dark btn-block" type="submit">Add to wishlist</button>
                </div>
            </form>

            <div class="trust">
                <div>Delivery · In-store shopping</div>
                <div>Always open · Mirigama 11200</div>
                <div>WhatsApp +94 76 335 1580</div>
                <div>dhcshoe@gmail.com</div>
            </div>

            <div class="tabs" id="tabs">
                <button type="button" class="is-on" data-tab="details">Details</button>
                <button type="button" data-tab="fit">Fit &amp; sizing</button>
                <button type="button" data-tab="materials">Materials</button>
                <button type="button" data-tab="shipping">Shipping &amp; returns</button>
            </div>
            <div class="tab-panel" id="tab-details">
                <ul>
                    @foreach ($product['details'] as $detail)
                        <li>{{ $detail }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-panel" id="tab-fit" hidden>
                <p>EU sizes 38–43. If you are between sizes, take the larger last. Easy size exchange after delivery.</p>
            </div>
            <div class="tab-panel" id="tab-materials" hidden>
                <p>Synthetic uppers with a cushioned insole and rubber outsole, built for everyday street wear.</p>
            </div>
            <div class="tab-panel" id="tab-shipping" hidden>
                <p>Delivery and in-store shopping from Mirigama, Sri Lanka (11200). Always open. WhatsApp +94 76 335 1580 or email dhcshoe@gmail.com.</p>
            </div>
        </div>
    </div>

    <section class="section" style="padding-top: 0;">
        <div class="wrap">
            <div class="section-head">
                <h2 class="section-title">You may also like</h2>
                <a class="section-link" href="{{ route('shop') }}">View all →</a>
            </div>
            <div class="product-grid shop-grid">
                @foreach ($related as $item)
                    @include('store.partials.product-card', ['product' => $item])
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('#thumbs button').forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('#thumbs button').forEach((b) => b.classList.remove('is-on'));
            btn.classList.add('is-on');
            document.getElementById('mainShot').src = btn.dataset.src;
        });
    });

    document.querySelectorAll('.product-info .swatch, .size-opt').forEach((el) => {
        el.addEventListener('click', () => {
            const group = el.classList.contains('swatch') ? '.product-info .swatch' : '.size-opt';
            document.querySelectorAll(group).forEach((n) => n.classList.remove('is-on'));
            el.classList.add('is-on');
        });
    });

    document.querySelectorAll('#tabs button').forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('#tabs button').forEach((b) => b.classList.remove('is-on'));
            btn.classList.add('is-on');
            document.querySelectorAll('.tab-panel').forEach((panel) => panel.hidden = true);
            document.getElementById('tab-' + btn.dataset.tab).hidden = false;
        });
    });
</script>
@endpush
