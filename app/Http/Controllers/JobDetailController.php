<?php

namespace App\Http\Controllers;

use App\Models\Application;
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

        $data = [
            'job'              => $job,
            'relatedJobs'      => $relatedJobs,
            'relatedJobsCount' => $relatedJobsCount,
            'savedJob'         => $savedJob,
            'applied'          => $applied,
        ];
        return view('job-detail')->with($data);
    }
}
