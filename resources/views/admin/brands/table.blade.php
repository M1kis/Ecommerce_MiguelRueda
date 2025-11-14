@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
    <h3> Brands List </h3>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
                <i class="material-symbols-rounded align-middle">add</i>
                Add New Brand
            </a>
        </div>

    
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>

                </tr>
            </thead>
            <tbody>

                @foreach($brands as $brand)
                
                <tr>
                    <td class="align-middle text-center">
                        {{ $brand->id }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $brand->name }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $brand->created_at }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $brand->updated_at }}
                    </td>

                    <td class="align-middle text-center">
                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta marca?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; background: none; border: none; cursor: pointer; text-decoration: underline; padding: 0;">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $brands->links() }}
    </div>
</div>
@endsection

