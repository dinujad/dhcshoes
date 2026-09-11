<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function home()
    {
        return view('store.home', [
            'categories' => Catalog::categories(),
            'featured' => array_slice(Catalog::products(), 0, 6),
        ]);
    }

    public function shop(Request $request)
    {
        $category = $request->string('category')->toString() ?: null;
        $products = Catalog::all($category);

        if ($q = $request->string('q')->toString()) {
            $products = array_values(array_filter($products, function (array $product) use ($q) {
                return str_contains(strtolower($product['name']), strtolower($q));
            }));
        }

        return view('store.shop', [
            'products' => $products,
            'category' => $category,
            'q' => $q,
        ]);
    }

    public function product(string $slug)
    {
        $product = Catalog::find($slug);
        abort_unless($product, 404);

        return view('store.product', [
            'product' => $product,
            'related' => array_slice(Catalog::related($slug) ?: Catalog::bestsellers(), 0, 4),
        ]);
    }

    public function about()
    {
        return view('store.about');
    }

    public function addToBag(Request $request)
    {
        $data = $request->validate([
            'slug' => ['required', 'string'],
            'size' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
        ]);

        $product = Catalog::find($data['slug']);
        abort_unless($product, 404);

        $bag = session('bag', []);
        $bag[] = [
            'slug' => $product['slug'],
            'name' => $product['name'],
            'size' => $data['size'] ?? $product['sizes'][0],
            'color' => $data['color'] ?? $product['colors'][0]['name'],
        ];
        session(['bag' => $bag]);

        return back()->with('status', $product['name'].' added to bag.');
    }
}
