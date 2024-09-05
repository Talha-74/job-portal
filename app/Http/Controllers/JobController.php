<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Application;
use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\JobSaved;
use App\Models\TrendingKeywords;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $route = Route::currentRouteAction();
        $categories = Category::all();
        $cities = City::all()->groupBy('province');
        return view('job', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        try {
            if ($request->hasFile('image_path'))
                $imagePath = $request->file('image_path')->store('public/job-images');
            $jobImage = url(Storage::url($imagePath));

            $job = [
                'job_title'             => $request->job_title,
                'job_region'            => $request->job_region,
                'job_type'              => $request->job_type,
                'company'               => $request->company,
                'vacancy'               => $request->vacancy,
                'experience'            => $request->experience,
                'category'              => $request->category,
                'salary'                => $request->salary,
                'gender'                => $request->gender,
                'application_deadline'  => $request->application_deadline,
                'job_description'       => $request->job_description,
                'responsibilities'      => $request->responsibilities,
                'education_experience'  => $request->education_experience,
                'other_benefits'        => $request->other_benefits,
                'image_path'            => $jobImage,
            ];

            Job::create($job);

            return redirect()->back()->with('message', 'Job created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Error: ' . $th->getMessage());
        }
    }

    function saveJob(Request $request)
    {

        // Log the request data
        Log::info('Request data:', $request->all());

        // Validate request data if necessary
        $validatedData = $request->validate([
            'job_id' => 'required|integer',
            'user_id' => 'required|integer',
            'image_path' => 'required|string',
            'job_title' => 'required|string',
            'job_region' => 'required|string',
            'job_type' => 'required|string',
            'company' => 'required|string',
        ]);

        // Create the job saved record
        $saveJob = JobSaved::create($validatedData);
        if ($saveJob) {
            return redirect('/job-detail/' . $request->job_id . '')->with('message', 'Job saved Successfully');
        }
    }

    function ApplyJob(Request $request)
    {
        $applyJob = Application::create([
            'cv' => Auth::user()->cv,
            'job_id' => $request->job_id,
            'user_id' => Auth::user()->id,
            'image_path' => $request->image_path,
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'job_type' => $request->job_type,
            'company' => $request->company,
        ]);
        return redirect()->back()->with('message', 'You apply for this job Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function searchResult(Request $request)
    {
        $job_title = $request->get('job_title');
        $job_region = $request->get('job_region');
        $job_type = $request->get('job_type');

        $searchResult = Job::where(function ($query) use ($job_title, $job_region, $job_type) {
            $query->where('job_title', 'like', "%{$job_title}%")
                ->orWhere('job_region', 'like', "%{$job_region}%")
                ->orWhere('job_type', 'like', "%{$job_type}%");
        })->get();

        // Storing trending keyword
        $trendingKeyword = TrendingKeywords::where('keyword', $request->job_title)->first();

        if($trendingKeyword) {
            // If it exists, just update the `updated_at` timestamp
            $trendingKeyword->touch();
        } else {
            $trendingKeyword = TrendingKeywords::create([
            'keyword' => $request->job_title,
        ]);
    }

        return view('searchResult', compact('searchResult'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

}
