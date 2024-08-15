<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobDetailController extends Controller
{

    public function show(Job $job)
    {
        $relatedJobs = Job::where('category', $job->category)
            ->where('id', '!=', $job->id)
            ->take(5)
            ->get();
        $relatedJobsCount = $relatedJobs->count();

        // save job:
        $savedJob = JobSaved::where('job_id', $job->id)
            ->where('user_id', Auth::user()->id)
            ->count();

        // applied to a job
        $applied = Application::where('user_id', Auth::user()->id)
            ->where('job_id', $job->id)
            ->count();

        // categories
        $categories = Category::all();

        $data = [
            'job'              => $job,
            'relatedJobs'      => $relatedJobs,
            'relatedJobsCount' => $relatedJobsCount,
            'savedJob'         => $savedJob,
            'applied'          => $applied,
            'categories'       => $categories
        ];
        return view('job-detail')->with($data);
    }

    public function categoryJobs($name)
    {
        // Get the count of all jobs and filter jobs by category
        $jobs = Job::count();
        $jobslist = Job::select(['id', 'job_title', 'company', 'job_region', 'job_type', 'image_path'])
            ->where('category', $name)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        // Pass the filtered jobs and total jobs to the homepage
        return redirect()->route('home')->with([
            'jobs' => $jobs,
            'jobslist' => $jobslist,
            'filteredCategory' => $name,
        ]);
    }

}
