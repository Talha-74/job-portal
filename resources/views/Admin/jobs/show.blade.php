@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
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
                <h5 class="card-title mb-4 d-inline">Jobs</h5>
                <a href="{{ route('job.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Jobs</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Company</th>
                            <th scope="col">Job_region</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($jobs as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->job_title }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->company }}</td>
                            <td>{{ $item->job_region }}</td>
                            <td>
                            <form action="{{ route('delete.job', $item->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this job?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-center">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
