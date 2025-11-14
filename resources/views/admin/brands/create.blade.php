@extends('admin.layouts.app')
@section('content')
    <h1 class="mb-4">Add New Brand</h1>

    <div class="card">
        <div class="card-body">
    <div class="p-4">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.brands.store') }}" method="post" id="brandForm">
            @csrf
            <div class="input-group input-group-outline mb-4">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
            <button class="btn bg-gradient-success" type="submit" name="Save" id="submitBtn">Add Brand</button>
        </form>
    </div>
        </div>
    </div>

    <script>
        document.getElementById('brandForm').addEventListener('submit', function() {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Guardando...';
        });
    </script>
@endsection

