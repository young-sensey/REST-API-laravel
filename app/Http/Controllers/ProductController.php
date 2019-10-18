<?php

namespace App\Http\Controllers;

use App\Product;
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
        $filter = [
            'pageSize' => 8,
            'category_id' => Input::get('category')
        ];
        return Product::getProducts($filter);
    }

    /**
     * Get information about product
     *
     * @param $id
     * @return mixed
     */
    public static function show($id)
    {
        return Product::getProduct($id);
    }
}
