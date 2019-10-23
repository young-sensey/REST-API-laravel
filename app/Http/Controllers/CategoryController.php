<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    protected $categoryModel;

    /**
     * CategoryController constructor.
     * @param Category $categoryModel
     */
    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return response()->json([
            'categories' => $this->categoryModel->withCount('products')->get()
        ]);
    }
}
