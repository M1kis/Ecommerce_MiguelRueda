@extends('admin.layouts.app')

@section('content')
<div style="max-width:1100px;margin:0 auto">
     <h1 style="margin:0 0 16px 0;font-size:22px;font-weight:800;color:#111827;">Agregar nueva categoria</h1>

  <div style="border:1px solid #e5e7eb;border-radius:14px;background:#ffffff;box-shadow:0 1px 3px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.03);">
    <div style="padding:18px 18px 0 18px;">
      @if($errors->any())
        <div role="alert"
             style="position:relative;margin-bottom:16px;padding:12px 42px 12px 12px;border-radius:12px;background:#fef2f2;color:#991b1b;border:1px solid #fecaca;">
          <ul style="margin:0;padding-left:18px;">
            @foreach($errors->all() as $error)
              <li style="font-size:13px;line-height:1.5;">{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" data-bs-dismiss="alert" aria-label="Close"
                  style="position:absolute;right:10px;top:10px;height:28px;width:28px;border:0;border-radius:8px;background:transparent;color:#991b1b;cursor:pointer;font-size:18px;line-height:1;">×</button>
        </div>
      @endif

      @if(session('success'))
        <div role="status"
             style="position:relative;margin-bottom:16px;padding:12px 42px 12px 12px;border-radius:12px;background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0;">
          <span style="font-size:13px;line-height:1.5;">{{ session('success') }}</span>
          <button type="button" data-bs-dismiss="alert" aria-label="Close"
                  style="position:absolute;right:10px;top:10px;height:28px;width:28px;border:0;border-radius:8px;background:transparent;color:#065f46;cursor:pointer;font-size:18px;line-height:1;">×</button>
        </div>
      @endif
    </div>

    <div style="padding:0 18px 18px 18px;">
      <form action="{{ route('admin.categories.store') }}" method="post" id="categoryForm">
        @csrf

        <!-- Campo: Name -->
        <div style="margin-bottom:16px;">
          <label for="name" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Nombre</label>
          <input
            id="name"
            type="text"
            name="name"
            placeholder="Nombre del producto"
            value="{{ old('name') }}"
            required
            style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('name') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
            onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.1)';"
            onblur="this.style.borderColor='{{ $errors->has('name') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
            aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
          />
          @error('name')
            <p style="margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</p>
          @enderror
        </div>

        <!-- Botón submit (verde éxito consistente) -->
        <button
          class="btn"
          type="submit"
          name="Save"
          id="submitBtn"
          style="display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:10px 16px;border-radius:10px;border:1px solid #16a34a;background:#16a34a;color:#ffffff;font-weight:700;font-size:14px;cursor:pointer;box-shadow:0 1px 2px rgba(0,0,0,.06);transition:background .15s ease;"
          onmouseover="this.style.background='#15803d';"
          onmouseout="this.style.background='#16a34a';"
          onfocus="this.style.boxShadow='0 0 0 3px rgba(22,163,74,.25)';"
          onblur="this.style.boxShadow='0 1px 2px rgba(0,0,0,.06)';"
        >
          Agregar categoria
        </button>
      </form>
    </div>
  </div>

</div>

  <script>
    document.getElementById('categoryForm').addEventListener('submit', function() {
      const submitBtn = document.getElementById('submitBtn');
      submitBtn.disabled = true;
      submitBtn.textContent = 'Guardando...';
      submitBtn.style.opacity = '0.7';
      submitBtn.style.cursor = 'not-allowed';
    });
  </script>
@endsection
