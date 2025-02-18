<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::with('posts')->get();
    }

    public function store(Request $request)
    {
        return Category::create($request->only(['name']));
    }

    public function show(Category $category)
    {
        return $category->load('posts');
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->only(['name']));
        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}

