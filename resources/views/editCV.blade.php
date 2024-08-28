@extends('layouts.app')
@section('content')
<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
    style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top:-24px;" id="home-section">

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Update CV</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <a href="#">Job</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>update CV</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="site-section">
    <div class="container">

        @if (Session::has('success'))
        <div class="w-100 mb-4 alert alert-pro alert-success alert-dismissible">
            <div class="alert-text">
                <h6>{{ Session::get('success') }}</h6>
                </p>
            </div>
            <button class="close" data-dismiss="alert"></button>
        </div>
        @elseif (Session::has('error'))
        <div class="w-100 mb-4 alert alert-pro alert-danger alert-dismissible">
            <div class="alert-text">
                <h6>{{ Session::get('error') }}</h6>
                </p>
            </div>
            <button class="close" data-dismiss="alert"></button>
        </div>
        @endif

        <div class="row align-items-center mb-2">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2>Update CV</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12">
                <form action="{{ route('update.cv')}}" class="p-4 p-md-5 border rounded" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                   
                    <div class="form-group">
                        <label for="cv">Upload CV/Resume </label>
                        <input type="file" name="cv" id="cv" class="form-control" style="padding-bottom: 40px;">
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-block btn-primary btn-md"
                                    style="margin-left: 200px;" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
