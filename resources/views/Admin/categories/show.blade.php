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
                <h5 class="card-title mb-4 d-inline">Categories</h5>

                <a href="{{ route('create.category') }}" class="btn btn-primary mb-4 text-center float-right">Create
                    Categories</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ route('edit.category', $item->id) }}" class="btn btn-warning text-white text-center ">Update </a></td>
                            <td>
                                <form action="{{ route('delete.category', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
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
