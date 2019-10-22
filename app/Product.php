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

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
