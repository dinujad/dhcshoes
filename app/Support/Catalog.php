<?php

namespace App\Support;

class Catalog
{
    public static function categories(): array
    {
        return [
            ['slug' => 'men', 'name' => 'Men', 'caption' => 'Stylish & Comfortable', 'image' => '/images/products/p4.png'],
            ['slug' => 'women', 'name' => 'Women', 'caption' => 'Elegant & Trendy', 'image' => '/images/products/p5.png'],
            ['slug' => 'street', 'name' => 'Street', 'caption' => 'Fun & Durable', 'image' => '/images/products/p1.png'],
            ['slug' => 'men', 'name' => 'Sports', 'caption' => 'Performance Driven', 'image' => '/images/products/p8.png'],
            ['slug' => 'women', 'name' => 'Casual', 'caption' => 'Everyday Essentials', 'image' => '/images/products/p7.png'],
            ['slug' => 'street', 'name' => 'Court', 'caption' => 'Relax in Style', 'image' => '/images/products/p3.png'],
        ];
    }

    public static function collections(): array
    {
        return [
            [
                'slug' => 'red-black',
                'name' => 'Black & Red',
                'caption' => 'House colours',
                'image' => '/images/products/p2.png',
            ],
            [
                'slug' => 'everyday',
                'name' => 'Everyday Court',
                'caption' => 'All-day comfort',
                'image' => '/images/products/p4.png',
            ],
            [
                'slug' => 'city',
                'name' => 'City Street',
                'caption' => 'Built for movement',
                'image' => '/images/products/p8.png',
            ],
        ];
    }

    public static function all(?string $category = null): array
    {
        return array_values(array_filter(self::products(), function (array $product) use ($category) {
            if (! $category) {
                return true;
            }
            if ($category === 'sale') {
                return ($product['badge'] ?? '') === 'Sale';
            }

            return $product['category'] === $category;
        }));
    }

    public static function bestsellers(): array
    {
        return array_values(array_filter(self::products(), fn (array $product) => $product['bestseller'] ?? false));
    }

    public static function find(string $slug): ?array
    {
        foreach (self::products() as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }

    public static function related(string $slug): array
    {
        $current = self::find($slug);

        return array_values(array_filter(self::products(), function (array $product) use ($slug, $current) {
            return $product['slug'] !== $slug && $current && $product['category'] === $current['category'];
        }));
    }

    public static function products(): array
    {
        $copy = 'Step up your everyday style with these modern street sneakers. Designed for comfort, durability, and effortless fashion — for work, university, or weekend outings.';
        $details = [
            'Delivery across Sri Lanka',
            'In-store shopping in Mirigama',
            'Always open',
            'WhatsApp +94 76 335 1580',
        ];
        $sizes = ['38', '39', '40', '41', '42', '43'];

        $items = [
            ['black-red-white-street', 'Black & Red Street Sneakers', 4990, 'street', 'Bestseller', true, 'p1.png', [['Ink', '#111111'], ['White', '#f4f4f4'], ['Red', '#e31c24']]],
            ['red-black-sneakers', 'Red & Black Sneakers', 4990, 'men', 'Bestseller', true, 'p2.png', [['Red', '#e31c24'], ['Ink', '#111111']]],
            ['white-navy-court', 'White & Navy Court', 3290, 'women', 'Sale', true, 'p3.png', [['White', '#f4f4f4'], ['Navy', '#1e3a5f']]],
            ['black-street-sneakers', 'Black Street Sneakers', 4990, 'men', 'New', true, 'p4.png', [['Ink', '#111111'], ['White', '#f4f4f4']]],
            ['white-red-line', 'White Red Line Court', 3290, 'women', 'New', true, 'p5.png', [['White', '#f4f4f4'], ['Red', '#e31c24'], ['Ink', '#111111']]],
            ['urban-red-low-top', 'DHC Urban Red Low Top', 4990, 'men', 'Bestseller', true, 'p6.png', [['Red', '#e31c24'], ['White', '#f4f4f4']]],
            ['white-black-court', 'White Court Sneakers', 3290, 'women', 'Sale', false, 'p7.png', [['White', '#f4f4f4'], ['Ink', '#111111']]],
            ['blue-white-street', 'Blue & White Street Sneakers', 4990, 'street', 'Sale', false, 'p8.png', [['Navy', '#1e3a5f'], ['White', '#f4f4f4']]],
            ['white-black-street', 'White & Black Street', 4990, 'street', null, false, 'p9.png', [['White', '#f4f4f4'], ['Ink', '#111111']]],
            ['navy-black-street', 'Navy & Black Street', 4990, 'men', null, false, 'p10.png', [['Navy', '#1e3a5f'], ['Ink', '#111111']]],
        ];

        $products = [];
        foreach ($items as $item) {
            [$slug, $name, $price, $category, $badge, $bestseller, $file, $colors] = $item;
            $image = '/images/products/'.$file;
            $products[] = [
                'slug' => $slug,
                'name' => $name,
                'price' => $price,
                'compare_at' => $price >= 4990 ? 5990 : 3500,
                'category' => $category,
                'badge' => $badge,
                'bestseller' => $bestseller,
                'rating' => 5.0,
                'reviews' => 5,
                'colors' => array_map(fn ($c) => ['name' => $c[0], 'hex' => $c[1]], $colors),
                'sizes' => $sizes,
                'image' => $image,
                'gallery' => [$image, $image, $image],
                'description' => $copy,
                'details' => $details,
            ];
        }

        return $products;
    }
}
