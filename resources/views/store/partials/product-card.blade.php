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
        <button class="add-cart" type="submit">Add to cart</button>
    </form>
</article>
