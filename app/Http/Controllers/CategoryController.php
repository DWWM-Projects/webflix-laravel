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

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // dump($request->name);
        // dump(request()->name);
        // dump(request('name'));

        $request->validate([
            'name' => 'required|min:2|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|unique:categories,name,'.$category->id,
        ]);

        $category->update([
            'name' => $request->name,
            // Ajouter le guarded dans App/models/Category
        ]);

        return redirect()->route('categories')->with('status', 'La catégorie '.$category->name.' a été modifiée.');
    }

    public function show(Category $category)
    {
        return view('categories.show', [
            // 'category' => Category::findOrFail($id),
            'category' => $category,
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories')->with('status', 'La catégorie '.$category->name.' a été modifiée.');

    }
}
