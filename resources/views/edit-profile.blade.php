@extends('layouts.app')
@section('content')
<!-- HOME -->
<section class="section-hero overlay inner-page bg-image"
    style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top:-24px;" id="home-section">

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Update Profile</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <a href="#">Job</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>update profile</strong></span>
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
                        <h2>Update Profile</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-lg-12">
                <form action="{{ route('update.profile')}}" class="p-4 p-md-5 border rounded" method="POST"
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
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                            placeholder="Title">
                    </div>
                   <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="">Bio</label>
                        <textarea name="bio" id="" cols="30" rows="7" class="form-control"
                            placeholder="Write your Bio..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="linkedin">LinkedIn Link</label>
                    <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Your LinkedIn Profile Link ...">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook Link</label>
                    <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Your Facebook Profile Link ...">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter Link</label>
                    <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Your Twitter Profile Link ...">
                </div>
                    <div class="form-group">
                        <label for="image">Profile Picture </label>
                        <input type="file" name="image" id="image" class="form-control"
                            style="padding-bottom: 40px;">
                    </div>
                    <div class="form-group">
                        <label for="cv">Upload CV/Resume </label>
                        <input type="file" name="cv" id="cv" class="form-control"
                            style="padding-bottom: 40px;">
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
