<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Get all categories
     *
     * @return mixed
     */
    public static function index()
    {
        return Category::withCount('products')->get();
    }
}
