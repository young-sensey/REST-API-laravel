<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function index()
    {
        $category_id = Input::get('category');

        $products = Product::query()
            ->select(['name', 'short_description', 'price', 'category_id'])
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_id', '=', $category_id);
            })
            ->with('category')
            ->simplePaginate();

        return view('products', ['products' => $products]);
    }
}
