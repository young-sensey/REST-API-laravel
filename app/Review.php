<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review',
        'rating',
        'user_id',
        'product_id'
    ];

    public $timestamps = false;

    /**
     * Get reviews about product
     *
     * @param $product_id
     * @return \Illuminate\Support\Collection
     */
    public static function getReviews($product_id)
    {
        $reviews = DB::table('reviews')
            ->select('id', 'review', 'rating', 'user_id')
            ->where('product_id', '=', $product_id)
            ->get();

        foreach ($reviews as $review) {
            $review->user = User::getUser($review->user_id);
            unset($review->user_id);
        }

        return $reviews;
    }

    /**
     * Get rating of product
     *
     * @param $product_id
     * @return float
     */
    public static function getRating($product_id)
    {
        $rating = DB::table('reviews')
            ->where('product_id', '=', $product_id)
            ->avg('rating');
        return round($rating, 1);
    }
}
