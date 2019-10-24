<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Get list of products with pagination
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $category_id = Input::get('category');

        $products = Product::query()
            ->select(['name', 'short_description', 'price', 'category_id'])
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_id', '=', $category_id);
            })
            ->with('category')
            ->paginate();

        return response()->json(['products' => $products]);
    }

    /**
     * Get information about product
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        $product->load('category', 'reviews')
            ->load(['reviews.user' => function ($query) {
                $query->select(['id', 'name']);
            }])
            ->append('average_rating');

        return response()->json(['product' => $product]);
    }
}
