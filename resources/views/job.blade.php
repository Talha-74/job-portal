@extends('layouts.app')
@section('content')
<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
    style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top:-24px;" id="home-section">

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Post A Job</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <a href="#">Job</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Post a Job</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section">
    <div class="container">

        @if (session()->has('message'))
        <div class="alert alert-success" style="display: flex; align-items: center;">
            {{ session()->get('message') }}
            <button type="button" class="close" aria-hidden="true" style="margin-left: auto; margin-right: 0;"
                onclick="this.parentElement.style.display='none'">X</button>
        </div>
        @endif

        <div class="row align-items-center mb-2">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2>Post A Job</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <form action="{{ route('job.store')}}" class="p-4 p-md-5 border rounded" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}

                    <!--job details-->
                    <div class="form-group">
                        <label for="job-title">Job Title</label>
                        <input type="text" name="job_title" class="form-control" id="job-title"
                            placeholder="Product Designer">
                            @error('job_title')
                             <span class="text-danger"><strong>{{ $message }}</strong></span>
                             @enderror
                        </div>

                    <div class="form-group">
                        <label for="job-region">Job Region</label>
                        <select name="job_region" class="selectpicker border rounded" id="job-region"
                            data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                            @foreach($cities as $province => $provinceCities)
                            <option value="" style="background: greenyellow" disabled>{{ $province }} Cities</option>
                            @foreach($provinceCities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                            @endforeach
                        </select>
                        @error('job_region')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="job-type">Job Type</label>
                        <select name="job_type" class="selectpicker border rounded" id="job-type" data-style="btn-black"
                            data-width="100%" data-live-search="true" title="Select Job Type">
                            <option>Part Time</option>
                            <option>Full Time</option>
                        </select>
                        @error('job_type')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" name="company" class="form-control" id="company" placeholder="Company Name">
                        @error('company')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="job-location">Vacancy</label>
                        <input name="vacancy" type="text" class="form-control" id="job-location" placeholder="e.g. 3">
                        @error('job_location')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="job-type">Experience</label>
                        <select name="experience" class="selectpicker border rounded" id="job-type"
                            data-style="btn-black" data-width="100%" data-live-search="true"
                            title="Select Years of Experience">
                            <option>1-3 years</option>
                            <option>3-6 years</option>
                            <option>6-9 years</option>
                        </select>
                        @error('experience')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <select name="salary" class="selectpicker border rounded" id="job-type" data-style="btn-black"
                            data-width="100%" data-live-search="true" title="Select Salary">
                            <option>$50k - $70k</option>
                            <option>$70k - $100k</option>
                            <option>$100k - $150k</option>
                        </select>
                        @error('salary')
                       <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Job Category</label>
                        <select name="category" class="selectpicker border rounded" id="category" data-style="btn-black"
                            data-width="100%" data-live-search="true" title="Select Category">
                            @foreach ($categories as $category)
                            <option>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="selectpicker border rounded" id="" data-style="btn-black"
                            data-width="100%" data-live-search="true" title="Select Gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Any</option>
                        </select>
                        @error('gender')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="job-location">Application Deadline</label>
                        <input name="application_deadline" type="date" min="2024-01-01" max="2028-01-02"
                            class="form-control" id="" placeholder="e.g. 20-12-2022">
                            @error('application_deadline')
                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                            @enderror
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="">Job Description</label>
                            <textarea name="job_description" id="" cols="30" rows="7" class="form-control"
                                placeholder="Write Job Description..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="">Responsibilities</label>
                            <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control"
                                placeholder="Write Responsibilities..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="">Education & Experience</label>
                            <textarea name="education_experience" id="" cols="30" rows="7" class="form-control"
                                placeholder="Write Education & Experience..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="">Other Benifits</label>
                            <textarea name="other_benefits" id="" cols="30" rows="7" class="form-control"
                                placeholder="Write Other Benifits..."></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="image_path">Job Related Image </label>
                        <input type="file" name="image_path" id="image_path" class="form-control"
                            style="padding-bottom: 40px;">
                            @error('image_path')
                       <span class="text-danger"><strong>{{ $message }}</strong></span>
                            @enderror
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                    style="margin-left: 200px;" value="Save Job">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
