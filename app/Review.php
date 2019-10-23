<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
     * Get the user that left a review
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
