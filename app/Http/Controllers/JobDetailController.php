<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobDetailController extends Controller
{

    public function show(Job $job)
    {
        $data = [
            'job' => $job,
        ];
        return view('job-detail')->with($data);
    }

}
