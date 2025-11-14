@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('content')
<div style="min-height:100vh;background:transparent ;padding:24px;display:flex;align-items:flex-start;justify-content:center;">
  <div style="width:100%;max-width:720px;background:#ffffff;border:1px solid #e5e7eb;border-radius:16px;box-shadow:0 1px 3px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.03);padding:28px 24px;margin-top:0;">
    <h1 style="margin:0 0 18px 0;font-size:22px;font-weight:800;color:#111827;">Agregar nuevo producto</h1>
    <p style="margin:0 0 24px 0;font-size:13px;color:#475569;">Completa los campos para registrar un nuevo producto.</p>

    <form action="{{ route('admin.products.store') }}" method="POST">
      @csrf

      <!-- Product Name -->
      <div style="margin-bottom:14px;">
        <label for="name" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Nombre del producto</label>
        <input
          id="name"
          type="text"
          name="name"
          value="{{ old('name') }}"
          placeholder="Ingresa el nombre del producto"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('name') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.1)';"
          onblur="this.style.borderColor='{{ $errors->has('name') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        />
        @error('name')
          <p style="margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</p>
        @enderror
      </div>

      <!-- Description -->
      <div style="margin-bottom:14px;">
        <label for="description" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Descripción</label>
        <textarea
          id="description"
          name="description"
          rows="4"
          placeholder="Escribe una breve descripcion..."
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('description') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;resize:vertical;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.1)';"
          onblur="this.style.borderColor='{{ $errors->has('description') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        >{{ old('description') }}</textarea>
        @error('description')
          <p style="margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</p>
        @enderror
      </div>

      <!-- Price -->
      <div style="margin-bottom:14px;">
        <label for="price" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Precio</label>
        <div style="position:relative;">
          <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#64748b;font-size:14px;">$</span>
          <input
            id="price"
            type="number"
            step="0.01"
            min="0"
            name="price"
            value="{{ old('price') }}"
            placeholder="0.00"
            style="display:block;width:100%;padding:10px 12px 10px 26px;border:1px solid {{ $errors->has('price') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
            onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.1)';"
            onblur="this.style.borderColor='{{ $errors->has('price') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
          />
        </div>
        @error('price')
          <p style="margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</p>
        @enderror
        <p style="margin-top:6px;font-size:12px;color:#64748b;">Formato sugerido: 1980000.00</p>
      </div>

      <!-- Category -->
      <div style="margin-bottom:14px;">
        <label for="productCategory" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Categoria</label>
        <select
          id="productCategory"
          name="category"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('category') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.1)';"
          onblur="this.style.borderColor='{{ $errors->has('category') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        >
          <option value="" disabled {{ old('category') ? '' : 'selected' }}>Seleccionar categoria</option>
          @foreach ($categories as $item)
            <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
              {{ $item->name }}
            </option>
          @endforeach
        </select>
        @error('category')
          <p style="margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</p>
        @enderror
      </div>

      <!-- Brand -->
      <div style="margin-bottom:20px;">
        <label for="productBrand" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Marca</label>
        <select
          id="productBrand"
          name="brand"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('brand') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.1)';"
          onblur="this.style.borderColor='{{ $errors->has('brand') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        >
          <option value="" disabled {{ old('brand') ? '' : 'selected' }}>Seleccionar marca</option>
          @foreach ($brands as $item)
            <option value="{{ $item->id }}" {{ old('brand') == $item->id ? 'selected' : '' }}>
              {{ $item->name }}
            </option>
          @endforeach
        </select>
        @error('brand')
          <p style="margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</p>
        @enderror
      </div>

      <!-- Submit -->
      <div>
        <button
          type="submit"
          style="width:100%;padding:12px 16px;border-radius:10px;border:1px solid #111827;background:#111827;color:#ffffff;font-size:16px;font-weight:600;cursor:pointer;box-shadow:0 1px 2px rgba(0,0,0,.06);transition:background .15s ease;"
          onmouseover="this.style.background='#1f2937';"
          onmouseout="this.style.background='#111827';"
          onfocus="this.style.boxShadow='0 0 0 3px rgba(17,24,39,.25)';"
          onblur="this.style.boxShadow='0 1px 2px rgba(0,0,0,.06)';"
        >
          ➕ Create Product
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
