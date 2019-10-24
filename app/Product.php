<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    protected $perPage = 8;

    /**
     * Get product category
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get product reviews
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * get average_rating of product
     *
     * @return float
     */
    public function getAverageRatingAttribute()
    {
        return round($this->reviews->avg('rating'), 1);
    }
}
