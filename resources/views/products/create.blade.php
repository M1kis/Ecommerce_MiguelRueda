@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="min-h-screen bg-gray-50 px-4 py-12">
    <div class="w-full max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 sm:p-10">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-10">Add New Product</h1>

        <form action="#" method="POST">
            @csrf

            {{-- PRODUCT NAME --}}
            <div class="input-group input-group-outline mb-3">
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    placeholder="Enter product name"
                >
            </div>

            {{-- DESCRIPTION --}}
            <div class="input-group input-group-outline mb-3">
                <textarea 
                    name="description" 
                    rows="3" 
                    class="form-control" 
                    placeholder="Write a short product description..."
                ></textarea>
            </div>

            {{-- PRICE --}}
            <div class="input-group input-group-outline mb-3">
                <input 
                    type="number" 
                    name="price" 
                    class="form-control" 
                    placeholder="0.00"
                >
            </div>

            {{-- CATEGORY --}}
            <div class="input-group input-group-outline mb-3">
                <select class="form-control" id="productCategory" name="category_id">
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- BRAND --}}
            <div class="input-group input-group-outline mb-3">
                <select name="brand_id" class="form-control">
                    <option selected disabled>Select a brand</option>
                    @if (isset($brands) && count($brands) > 0)
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    @else
                        <option disabled>No brands available</option>
                    @endif
                </select>
            </div>

            {{-- IMAGE --}}
            <div class="input-group input-group-outline mb-3">
                <input 
                    type="text" 
                    name="image" 
                    class="form-control" 
                    placeholder="https://example.com/product.png"
                >
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
