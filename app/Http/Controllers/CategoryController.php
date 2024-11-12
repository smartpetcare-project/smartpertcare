<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all()->toArray();
        
        return view('category.index', compact('category'));
    }

    public function create() 
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|in:product,article,service'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error_message', $validate->errors()->all());
        }

        $category = Category::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'type' => $request->type
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function edit($uuid)
    {
        $category = Category::where('uuid', $uuid)->firstOrFail();

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $uuid)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|in:product,article'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error_message', $validate->errors()->all());
        }

        $category = Category::where('uuid', $uuid)->firstOrFail();

        $category->update([
            'name' => $request->name,
            'type' => $request->type
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($uuid)
    {
        $category = Category::where('uuid', $uuid)->firstOrFail();
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
