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

                <h5 class="card-title mb-4 d-inline">Admins</h5>

                <a href="{{ route('create.admin') }}" class="btn btn-primary mb-4 text-center float-right">Create
                    Admins</a>
                <?php $i=0; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
