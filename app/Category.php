<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public $timestamps = false;

    /**
     * Get information about category
     *
     * @param $category_id
     * @return mixed
     */
    public static function getCategory($category_id)
    {
        $category = DB::table('categories')
            ->select('id', 'name', 'description')
            ->where('id', '=', $category_id)
            ->get()->first();
        return $category;
    }
}
