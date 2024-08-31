<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Job;
use App\Models\TrendingKeywords;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::count();
        $jobslist = Job::select(['id', 'job_title', 'company', 'job_region', 'job_type', 'image_path'])
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

        $cities = City::all()->groupBy('province');

        // dd(auth()->user()->getRoleNames());


        $keywords = TrendingKeywords::latest()->take(5)->get();

        $data = [
            'jobs' => $jobs,
            'jobslist' => $jobslist,
            'cities' => $cities,
            'keywords' => $keywords
        ];
        return view('home')->with($data);
    }

    function about() {
        return view('about');
    }

    function contact() {
        return view('contact');
    }
}
