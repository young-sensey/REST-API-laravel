<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoriesResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class CategoryController extends Controller
{
    /**
     * Get all categories
     *
     * @return CategoriesResource
     */
    public function index()
    {
        ProductResource::withoutWrapping();
        return new CategoriesResource(Category::withCount('products')->get());
    }
}
