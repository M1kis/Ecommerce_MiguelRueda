@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="min-h-screen bg-gray-50 px-4 py-0 flex items-start justify-center">
    <div class="w-full max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 sm:p-10 mt-0">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-10">Add New Product</h1>


        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            {{-- PRODUCT NAME --}}
            <div class="input-group input-group-outline mb-3">
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="Enter product name"
                    value="{{old('name')}}"
                >
                @error('name')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            {{-- DESCRIPTION --}}
<div class="input-group input-group-outline mb-3">
    <textarea 
        name="description" 
        rows="3" 
        class="form-control" 
        placeholder="Write a short product description..."
    >{{ old('description') }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


            {{-- PRICE --}}
            <div class="input-group input-group-outline mb-3">
                <input 
                    type="number" 
                    name="price" 
                    class="form-control" 
                    placeholder="0.00"
                    value="{{old('price')}}"

                >
                @error('price')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            {{-- CATEGORY --}}
            <div class="input-group input-group-outline mb-3">
                <select class="form-control" id="productCategory" name="category">
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            {{-- BRAND --}}
            <div class="input-group input-group-outline mb-3">
                <select class="form-control" id="productBrand" name="brand">
                    <option selected disabled>Select a brand</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                </select>
                @error('brand')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            {{-- SUBMIT BUTTON --}}
            <div class="mt-6">
                <button 
                    type="submit" 
                    class="w-full bg-gray-900 text-white py-3 rounded-lg hover:bg-gray-800 transition font-semibold text-lg"
                >
                    ➕ Create Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
