@extends('layouts.store')
@section('title', 'Shop | DHC Footwear Store')

@section('content')
    <section class="page-head">
        <div class="wrap">
            <p class="hero-kicker">DHC Footwear</p>
            <h1>{{ $category ? ucfirst($category) : 'Shop' }}</h1>
            <p>Street sneakers from Mirigama. Delivery and in-store shopping. Always open.</p>
        </div>
    </section>

    <div class="wrap">
        <div class="filters">
            <div class="pills">
                <a class="pill {{ ! $category ? 'is-active' : '' }}" href="{{ route('shop') }}">All</a>
                <a class="pill {{ $category === 'women' ? 'is-active' : '' }}" href="{{ route('shop', ['category' => 'women']) }}">Women</a>
                <a class="pill {{ $category === 'men' ? 'is-active' : '' }}" href="{{ route('shop', ['category' => 'men']) }}">Men</a>
                <a class="pill {{ $category === 'street' ? 'is-active' : '' }}" href="{{ route('shop', ['category' => 'street']) }}">Street</a>
                <a class="pill {{ $category === 'sale' ? 'is-active' : '' }}" href="{{ route('shop', ['category' => 'sale']) }}">Sale</a>
            </div>
            <div class="filter-tools">
                <span>{{ count($products) }} products</span>
            </div>
        </div>

        <div class="product-grid shop-grid">
            @forelse ($products as $product)
                @include('store.partials.product-card', ['product' => $product])
            @empty
                <p>No pairs in this chapter yet.</p>
            @endforelse
        </div>
    </div>
@endsection
