@php
    $stars = str_repeat('★', (int) round($product['rating'])) . str_repeat('☆', 5 - (int) round($product['rating']));
    $badge = $product['badge'] ?? null;
    $badgeClass = match ($badge) {
        'Sale' => 'badge-gold',
        'New' => 'badge-light',
        'Bestseller' => 'badge-dark',
        default => 'badge-dark',
    };
    $badgeLabel = match ($badge) {
        'Bestseller' => 'Best seller',
        'New' => 'New arrival',
        'Sale' => '20% off',
        default => $badge,
    };
@endphp
<article class="product-card">
    <a href="{{ route('product', $product['slug']) }}">
        <div class="product-card__media">
            @if ($badge)
                <span class="badge {{ $badgeClass }}">{{ $badgeLabel }}</span>
            @endif
            <span class="wish-btn" aria-hidden="true">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 20s-7-4.4-9.2-8.2C1 8.8 2.6 5.5 6 5.5c1.9 0 3.4 1 4 2.4.6-1.4 2.1-2.4 4-2.4 3.4 0 5 3.3 3.2 6.3C19 15.6 12 20 12 20z"/></svg>
            </span>
            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
        </div>
        <h3>{{ $product['name'] }}</h3>
        <p class="price">
            @if (!empty($product['compare_at']) && $product['compare_at'] > $product['price'])
                <s>Rs. {{ number_format($product['compare_at']) }}</s>
            @endif
            Rs. {{ number_format($product['price']) }}
        </p>
        <div class="rating">
            <span class="stars">{{ $stars }}</span>
            <span>({{ number_format($product['rating'], 1) }})</span>
        </div>
    </a>
    <form method="post" action="{{ route('bag.add') }}">
        @csrf
        <input type="hidden" name="slug" value="{{ $product['slug'] }}">
        <button class="add-cart" type="submit">
            Add to cart
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 8h12l-1 12H7L6 8z"/><path d="M9 8V7a3 3 0 0 1 6 0v1"/></svg>
        </button>
    </form>
</article>
