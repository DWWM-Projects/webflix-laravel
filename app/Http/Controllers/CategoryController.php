<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::paginate(4),
        ]);
    }

    public function show(Category $category)
    {
        return view('categories.show', [
            // 'category' => Category::findOrFail($id),
            'category' => $category,
        ]);
    }
}
