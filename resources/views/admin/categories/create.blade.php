@extends('admin.layouts.app')
@section('content')
    <h1 class="mb-4">Add New Category</h1>

    <div class="card">
        <div class="card-body">
    <div class="p-4">
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="input-group input-group-outline mb-4">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button class="btn bg-gradient-success" type="submit" name="Save">Add Category</button>
        </form>
    </div>
        </div>
    </div>
@endsection