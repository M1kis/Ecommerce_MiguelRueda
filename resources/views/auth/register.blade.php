@extends('layouts.app')

@section('content')
<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#f3f4f6;padding:48px 16px;">
  <div style="width:100%;max-width:480px;background:#ffffff;border:1px solid #e5e7eb;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,.06);padding:24px 22px;">
    <h2 style="margin:0 0 8px 0;font-size:22px;font-weight:800;text-align:center;color:#1f2937;">Crear cuenta</h2>
    <p style="margin:0 0 18px 0;font-size:13px;color:#6b7280;text-align:center;">Regístrate para empezar a comprar.</p>

    <form method="POST" action="{{ route('register') }}" novalidate>
      @csrf

      <!-- Nombre -->
      <div style="margin-bottom:14px;">
        <label for="name" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Nombre</label>
        <input
          id="name"
          type="text"
          name="name"
          value="{{ old('name') }}"
          required
          autocomplete="name"
          aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('name') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.10)';"
          onblur="this.style.borderColor='{{ $errors->has('name') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        />
        @error('name')
          <span style="display:block;margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</span>
        @enderror
      </div>

      <!-- Email -->
      <div style="margin-bottom:14px;">
        <label for="email" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Correo electrónico</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          autocomplete="email"
          aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('email') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.10)';"
          onblur="this.style.borderColor='{{ $errors->has('email') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        />
        @error('email')
          <span style="display:block;margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</span>
        @enderror
      </div>

      <!-- Password -->
      <div style="margin-bottom:14px;">
        <label for="password" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Contraseña</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          autocomplete="new-password"
          aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('password') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.10)';"
          onblur="this.style.borderColor='{{ $errors->has('password') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        />
        @error('password')
          <span style="display:block;margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</span>
        @enderror
        <small style="display:block;margin-top:6px;color:#6b7280;font-size:12px;">Mínimo 8 caracteres, combina letras y números.</small>
      </div>

      <!-- Password confirm -->
      <div style="margin-bottom:18px;">
        <label for="password-confirm" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Confirmar contraseña</label>
        <input
          id="password-confirm"
          type="password"
          name="password_confirmation"
          required
          autocomplete="new-password"
          style="display:block;width:100%;padding:10px 12px;border:1px solid #cbd5e1;border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.10)';"
          onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        />
      </div>

      <!-- Submit -->
      <button type="submit"
              style="width:100%;padding:10px 14px;border-radius:10px;border:1px solid #111827;background:#111827;color:#ffffff;font-size:14px;font-weight:700;cursor:pointer;box-shadow:0 1px 2px rgba(0,0,0,.06);transition:background .15s;"
              onmouseover="this.style.background='#1f2937';"
              onmouseout="this.style.background='#111827';"
              onfocus="this.style.boxShadow='0 0 0 3px rgba(17,24,39,.25)';"
              onblur="this.style.boxShadow='0 1px 2px rgba(0,0,0,.06)'">
        Registrarse
      </button>
    </form>

    <!-- Divider -->
    <div style="display:flex;align-items:center;gap:12px;margin:16px 0;">
      <div style="height:1px;background:#e5e7eb;flex:1;"></div>
      <span style="font-size:12px;color:#9ca3af;">o</span>
      <div style="height:1px;background:#e5e7eb;flex:1;"></div>
    </div>

    <!-- Login CTA -->
    <p style="margin:0;text-align:center;font-size:13px;color:#6b7280;">
      ¿Ya tienes una cuenta?
      <a href="{{ route('login') }}"
         style="color:#1d4ed8;text-decoration:none;font-weight:700;"
         onmouseover="this.style.textDecoration='underline'"
         onmouseout="this.style.textDecoration='none'">
        Inicia sesión
      </a>
    </p>
  </div>
</div>
@endsection