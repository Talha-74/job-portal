@extends('layouts.admin_layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Categories</h5>
                <form action="{{ route('update.category', $category->id) }}" method="POST">
                    @csrf
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" placeholder="Category name" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
