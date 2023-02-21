<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form fields
        $validateFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // If image exists, add it to storage
        if ($request->hasFile('image')) {
            $validateFields['image'] = $request->file('image')->store('upload', 'public');
        }
        
        // Generate slug and add it to form fields
        $formFields = Arr::add($validateFields, 'slug', str()->slug($request->name));

        // Create a new category
        $newCategory = Category::create($formFields);

        if ($newCategory) {
            return back()->with('message', 'New category successfully created');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate form fields
        $validateFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        // If image exist, add it to storage
        if ($request->hasFile('image')) {
            $validateFields['image'] = $request->file('image')->store('upload', 'public');
        }

        // Generate slug and add it to form fields
        $formFields = Arr::add($validateFields, 'slug', str()->slug($request->name));

        // Update the category
        Category::find($id)->update($formFields);

        return back()->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete category
        Category::find($id)->delete();

        return back()->with('message', 'Category deleted successfully');
    }
}
