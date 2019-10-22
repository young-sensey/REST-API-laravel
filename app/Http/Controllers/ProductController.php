<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Get list of products with pagination
     *
     * @return array
     */
    public static function index()
    {
        $category_id = Input::get('category');
        $query = Product::select(['name', 'short_description', 'price', 'category_id'])
            ->when(isset($category_id), function ($query) use ($category_id) {
                return $query->where('category_id', '=', $category_id);
            });

        $products = $query->paginate();
        $items = $products->items();

        foreach ($items as $item) {
            $item->push($item->category);
            unset($item->category_id);
        }

        return [
            'page' => $products->currentPage(),
            'pages' => $products->lastPage(),
            'data' => $items
        ];
    }

    /**
     * Get information about product
     *
     * @param $id
     * @return mixed
     */
    public static function show($id)
    {
        $product = Product::find($id);

        $product->average_rating = Review::getRating($id);
        $product->category = $product->category;

        $product->reviews = Review::getReviews($id);

        unset($product->category_id);

        return $product;
    }
}
