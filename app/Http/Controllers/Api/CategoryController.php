<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request)
    {
        // Create category if validation is ok
        $category = Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'color' => $request->input('color'),
            'order' => $request->input('order'),
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'category' => $category,
        ], 201);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();
        $category->fill($data)->save();

        return response()->json([
            'message' => 'Category updated successfully',
            'category' => $category,
        ], 200);
    }
}
