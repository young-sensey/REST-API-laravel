<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'price',
        'category_id'
    ];

    public $timestamps = false;

    /**
     * Get list of products with pagination
     *
     * @param $filter
     * @return array
     */
    public static function getProducts($filter)
    {
        $query = DB::table('products')
            ->select('name', 'short_description', 'price', 'category_id');

        if (isset($filter['category_id'])) {
            $query->where('category_id', '=', $filter['category_id']);
        }

        $products = $query->paginate($filter['pageSize']);

        $items = $products->items();
        foreach ($items as $item) {
            $item->category = Category::getCategory($item->category_id);
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
     * @param $product_id
     * @return mixed
     */
    public static function getProduct($product_id)
    {
        $product = self::find($product_id);
        $product->average_rating = Review::getRating($product_id);
        $product->category = Category::getCategory($product->category_id);
        $product->reviews = Review::getReviews($product_id);

        unset($product->category_id);

        return $product;
    }
}
