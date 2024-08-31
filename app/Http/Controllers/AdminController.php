<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('Admin.dashboard');
    }

    function show()
    {
        $admins = User::role('admin')->get();
        // dd($admins)->toArray();
        return view('Admin.show', compact('admins'));
    }

    function create()
    {
        return view('Admin.create');
    }

    function store(Request $request)
    {
        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        $admin->save();

        $admin->assignRole('admin');

        return redirect()->route('show.admin')->with('success', 'Admin Created Successfully');
    }

    function showCategory()
    {
        $categories = Category::all();
        return view('Admin.categories.show', compact('categories'));
    }

    function createCategory()
    {
        return view('Admin.categories.create');
    }

    function storeCategory(Request $request)
    {
        $category = new Category();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('show.category')->with('success', 'Category created successfully');
    }

    function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('show.category')->with('success', 'Category deleted successfully');
    }

    function editCategory(Category $category)
    {
        return view('Admin.categories.edit', compact('category'));
    }

    function updateCategory(Request $request,  Category $category)
    {
        $category->name = $request->name;
        $category->update();

        return redirect()->route('show.category')->with('success', 'Category updated successfully');
    }
}
