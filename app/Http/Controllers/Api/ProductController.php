<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsResource;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProductsResource
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

        return new ProductsResource($products);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        $product->load('category', 'reviews', 'reviews.user')
            ->append('average_rating');

        ProductResource::withoutWrapping();
        return new ProductResource($product);
    }
}
