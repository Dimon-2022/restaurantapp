<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('management.category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        $request->session()->flash('status', $request->name . ' is save successfully.');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('management.editCategory', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            ['name' => 'required|unique:categories|max:255']
        );
        $category = Category::find($category->id);

        $category->name = $request->name;
        $category->save();
        $request->session()->flash('status', $request->name . ' is update successfully.');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        Session()->flash('status', 'Category is deleted successfully.');
        return redirect()->route('category.index');
    }
}
