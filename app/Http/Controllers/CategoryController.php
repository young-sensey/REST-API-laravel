<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class CategoryController extends Controller
{
    /**
     * Get all categories
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function index()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $count = Product::where('category_id', '=', $category['id'])->count();
            $category['products_count'] = $count;
        }

        return $categories;
    }
}
