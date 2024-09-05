@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Job Applications</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">cv</th>
                            <th scope="col">job_id</th>
                            <th scope="col">job_title</th>
                            <th scope="col">company</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($appliedJobs as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td><a class="btn btn-success" href="{{ $item->cv }}">CV</a></td>
                            <td><a class="btn btn-success" href="{{ route('job.detail', $item->id) }}">Job Details</a></td>
                            <td>{{ $item->job_title }}</td>
                            <td>{{ $item->company }}</td>
                            <td><a href="#" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
