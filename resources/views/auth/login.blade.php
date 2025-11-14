@extends('layouts.app')

@section('content')
<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;background:#f3f4f6;padding:48px 16px;">
  <div style="width:100%;max-width:420px;background:#ffffff;border:1px solid #e5e7eb;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,.06);padding:24px 22px;">
    <h2 style="margin:0 0 8px 0;font-size:22px;font-weight:800;text-align:center;color:#1f2937;">Iniciar sesión</h2>
    <p style="margin:0 0 20px 0;font-size:13px;color:#6b7280;text-align:center;">Bienvenido de nuevo, ingresa tus credenciales.</p>

    <form method="POST" action="{{ route('login') }}" novalidate>
      @csrf

      <!-- Email -->
      <div style="margin-bottom:14px;">
        <label for="email" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Correo electrónico</label>
        <input
          id="email"
          type="email"
          name="email"
          value="{{ old('email') }}"
          required
          autocomplete="username"
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
      <div style="margin-bottom:8px;">
        <label for="password" style="display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:6px;">Contraseña</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          autocomplete="current-password"
          aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
          style="display:block;width:100%;padding:10px 12px;border:1px solid {{ $errors->has('password') ? '#ef4444' : '#cbd5e1' }};border-radius:10px;background:#fff;color:#0f172a;font-size:14px;box-shadow:0 1px 1px rgba(0,0,0,.02);outline:none;"
          onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.10)';"
          onblur="this.style.borderColor='{{ $errors->has('password') ? '#ef4444' : '#cbd5e1' }}'; this.style.boxShadow='0 1px 1px rgba(0,0,0,.02)';"
        />
        @error('password')
          <span style="display:block;margin-top:6px;font-size:12px;color:#dc2626;">{{ $message }}</span>
        @enderror
      </div>

      <!-- Remember + Forgot -->
      <div style="display:flex;align-items:center;justify-content:space-between;margin:10px 0 16px 0;">
        <label style="display:inline-flex;align-items:center;gap:8px;font-size:12px;color:#64748b;user-select:none;cursor:pointer;">
          <input type="checkbox" name="remember" style="width:16px;height:16px;border:1px solid #cbd5e1;border-radius:4px;">
          Recuérdame
        </label>

        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}"
             style="font-size:12px;color:#1d4ed8;text-decoration:none;font-weight:600;"
             onmouseover="this.style.textDecoration='underline'"
             onmouseout="this.style.textDecoration='none'">
            ¿Olvidaste tu contraseña?
          </a>
        @endif
      </div>

      <!-- Submit -->
      <button type="submit"
              style="width:100%;padding:10px 14px;border-radius:10px;border:1px solid #111827;background:#111827;color:#ffffff;font-size:14px;font-weight:700;cursor:pointer;box-shadow:0 1px 2px rgba(0,0,0,.06);transition:background .15s;"
              onmouseover="this.style.background='#1f2937';"
              onmouseout="this.style.background='#111827';"
              onfocus="this.style.boxShadow='0 0 0 3px rgba(17,24,39,.25)';"
              onblur="this.style.boxShadow='0 1px 2px rgba(0,0,0,.06)'">
        Ingresar
      </button>
    </form>

    <!-- Divider -->
    <div style="display:flex;align-items:center;gap:12px;margin:16px 0;">
      <div style="height:1px;background:#e5e7eb;flex:1;"></div>
      <span style="font-size:12px;color:#9ca3af;">o</span>
      <div style="height:1px;background:#e5e7eb;flex:1;"></div>
    </div>

    <!-- Register CTA -->
    <p style="margin:0;text-align:center;font-size:13px;color:#6b7280;">
      ¿No tienes una cuenta?
      <a href="{{ route('register') }}"
         style="color:#1d4ed8;text-decoration:none;font-weight:700;"
         onmouseover="this.style.textDecoration='underline'"
         onmouseout="this.style.textDecoration='none'">
        Regístrate aquí
      </a>
    </p>
  </div>
</div>
@endsection