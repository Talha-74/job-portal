@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                <form method="POST" action="{{ route('store.admin') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline mb-4 mt-4">
                        <input type="name" name="name" id="name" class="form-control"
                            placeholder="Enter your name here ..." />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter your email here ..." />
                    </div>

                    {{-- <div class="form-outline mb-4">
                        <input type="text" name="username" id="form2Example1" class="form-control"
                            placeholder="username" />
                    </div> --}}
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password here ..." />
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
