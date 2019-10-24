<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    protected $productModel;

    /**
     * ProductController constructor.
     * @param Product $productModel
     */
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    /**
     * Get list of products with pagination
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $category_id = Input::get('category');

        $products = $this->productModel
            ->select(['name', 'short_description', 'price', 'category_id'])
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_id', '=', $category_id);
            })
            ->paginate();

        $products->transform(function ($product) {
            return $product->load('category');
        });

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
        $product->average_rating = round($product->reviews->avg('rating'), 1);

        $product->load('category', 'reviews');

        if ($product->reviews) {
            foreach ($product->reviews as $review) {
                $review->load(['user' => function ($query) {
                    $query->select(['id', 'name']);
                }]);
            }
        }

        return response()->json(['product' => $product]);
    }
}
