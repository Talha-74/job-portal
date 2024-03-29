<?php

namespace App\Http\Controllers;

use App\Models\Job;
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

        $data = [
            'jobs' => $jobs,
            'jobslist' => $jobslist
        ];
        return view('home')->with($data);
    }

    // public function jobdetails($job)
    // {
    //     $jobdetail = Job::find($job);
    //     $data = [
    //         'jobdetail' => $jobdetail,
    //     ];
    //     return view('home')->with($data);
    // }
}
