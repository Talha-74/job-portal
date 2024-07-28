<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobDetailController extends Controller
{

    public function show(Job $job)
    {
        $relatedJobs = Job::where('category', $job->category)
            ->where('id', '!=', $job->id)
            ->take(5)
            ->get();
        $data = [
            'job' => $job,
            'relatedJobs' => $relatedJobs
        ];
        return view('job-detail')->with($data);
    }
}
