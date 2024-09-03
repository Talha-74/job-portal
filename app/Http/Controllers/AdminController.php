<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $jobs = Job::count();

        $categories = Category::count();

        $admins = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'super-admin']);
        })->count();

        $applied = Application::count();

        return view('Admin.dashboard', compact('jobs', 'categories', 'admins', 'applied'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
        ]);
        
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
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->name;
        $category->update();

        return redirect()->route('show.category')->with('success', 'Category updated successfully');
    }

    function showJobs() {
        $jobs = Job::all();

        return view('Admin.jobs.show', compact('jobs'));
    }

    function deleteJob(Job $job) {
        $job->delete();

        return redirect()->back()->with('success', 'Job deleted Successfully');
    }
}
