<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
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
        return view('job');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'job_title' => 'required',
                'job_region' => 'required',
                'job_type' => 'required',
                'company' => 'required',
                'vacancy' => 'required',
                'experience' => 'required',
                'salary' => 'required',
                'gender' => 'required',
                'application_deadline' => 'required',
                'job_description' => 'required',
                'responsibilities' => 'required',
                'education_experience' => 'required',
                'other_benefits' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect(route('job.create'))
                ->withErrors($validator)
                    ->withInput();
            }

            $job = [
                'job_title' => $request->job_title,
                'job_region' => $request->job_region,
                'job_type' => $request->job_type,
                'company' => $request->company,
                'vacancy' => $request->vacancy,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'gender' => $request->gender,
                'application_deadline' => $request->application_deadline,
                'job_description' => $request->job_description,
                'responsibilities' => $request->responsibilities,
                'education_experience' => $request->education_experience,
                'other_benefits' => $request->other_benefits,
                'image_path' => 'public/assets/images/job-images/job_logo_1.jpg'
            ];

            Job::create($job);

            return redirect()->back()->with('message', 'Job created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Error: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
