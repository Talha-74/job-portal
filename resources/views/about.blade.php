@extends('layouts.app')
@section('content')
<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url({{ asset('assets/images/hero_1.jpg') }}); margin-top:-30px;"
    id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">About Us</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Home</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>About Us</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-image overlay-primary fixed overlay" id="next-section"
    style="background-image: url({{ asset('assets/images/hero_1.jpg') }});">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
                <p class="lead text-white">Explore our growing community where opportunities and talents meet. We're dedicated to connecting job seekers with their
                dream careers and helping employers find the perfect candidates.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="1930">0</strong>
                </div>
                <span class="caption">Candidates</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="54">0</strong>
                </div>
                <span class="caption">Jobs Posted</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="120">0</strong>
                </div>
                <span class="caption">Jobs Filled</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex align-items-center justify-content-center mb-2">
                    <strong class="number" data-number="550">0</strong>
                </div>
                <span class="caption">Companies</span>
            </div>


        </div>
    </div>
</section>


<section class="site-section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="block__96788">
                    <span class="play-icon"><span class="icon-play"></span></span>
                    <img src="{{ asset('assets/images/sq_img_6.jpg') }}" alt="Image" class="img-fluid img-shadow">
                </a>
            </div>
            <div class="col-lg-5 ml-auto">
                <h2 class="section-title mb-3">JobBoard For Freelancers, Web Developers</h2>
                <p class="lead">Unlock your potential with a platform designed to empower freelancers and web developers. Find projects
                    that match your skills and connect with clients who value your expertise.</p>
                <p>Whether you're just starting out or an experienced professional, our job board offers a wide range of opportunities
                    tailored to your career goals. Join a community where your skills can thrive, and success is within reach.</p>
            </div>
        </div>
    </div>
</section>

<section class="site-section pt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 order-md-2">
                <a data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="block__96788">
                    <span class="play-icon"><span class="icon-play"></span></span>
                    <img src="{{ asset('assets/images/sq_img_7.jpg') }}" alt="Image" class="img-fluid img-shadow">
                </a>
            </div>
            <div class="col-lg-5 mr-auto order-md-1  mb-5 mb-lg-0">
                <h2 class="section-title mb-3">JobBoard For Workers</h2>
                <p class="lead">Empowering workers across industries to find the right job opportunities. Whether you're skilled in
                    trades, services, or any other field, our platform connects you with employers who value your experience.</p>
                <p>From entry-level positions to advanced roles, explore a variety of job listings tailored to your expertise. Join a
                    community focused on helping you achieve your career aspirations and secure a stable future.</p>
            </div>
        </div>
    </div>
</section>


<section class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Our Team</h2>
            </div>
        </div>

        <div class="row align-items-center block__69944">

            <div class="col-md-6">
                <img src="{{ asset('assets/images/person_4.jpg') }}" alt="Image" class="img-fluid mb-4 rounded">
            </div>

            <div class="col-md-6">
                <h3>Faizan Khan</h3>
                <p class="text-muted">Creative Director</p>
                <p>With a passion for innovation and a keen eye for detail, Elisabeth leads our creative team in crafting compelling
                designs and strategies. Her expertise ensures that every project resonates with our audience, delivering impactful
                results that align with our brand vision.</p>
                <div class="social mt-4">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>
                </div>
            </div>

            <div class="col-md-6 order-md-2 ml-md-auto">
                <img src="{{ asset('assets/images/person_5.jpg') }}" alt="Image" class="img-fluid mb-4 rounded">
            </div>

            <div class="col-md-6">
                <h3>Sajid Khan</h3>
                <p class="text-muted">Project Manager</p>
                <p>Sajid brings a wealth of experience in managing complex projects, ensuring they are delivered on time and within scope.
                His leadership and organizational skills keep our team focused and motivated, driving success in every initiative we
                undertake.</p>
                <div class="social mt-4">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>
                </div>
            </div>
        </div>
</section>
@endsection
