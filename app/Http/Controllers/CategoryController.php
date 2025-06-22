<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Get all categories
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            $categories,
        ]);
    }

    /**
     * Create new category
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'category_background' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $category=Category::create(['name'=>$request['name'],
        'category_background'=>$request['category_background']
    ]);
        $path = $request->file('category_background')->store('category_background', 'public');
    
    // Delete old profile_photo if exists
    if ($category->category_background) {
        Storage::disk('public')->delete($category->category_background);
    }
    $category->update(['category_backgroun' => $path]);
        
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category,
            'category_backgroun' => asset("storage/{$path}"),
        ], Response::HTTP_CREATED); // 201 status
    }

    /**
     * Get single category
     */
    public function show(Category $category)
    {
        return response()->json([
            'data' => $category->load('clubs') // Load relationship
        ]);
    }

    /**
     * Update category
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id
        ]);

        $category->update($request->only('name'));
        
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    /**
     * Delete category
     */
    public function destroy(Category $category)
    {
        // Prevent deletion if category has clubs
        if($category->clubs()->exists()) {
            return response()->json([
                'error' => 'Cannot delete category with associated clubs'
            ], Response::HTTP_CONFLICT); // 409 status
        }

        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully'
        ], Response::HTTP_NO_CONTENT); // 204 status
    }
}