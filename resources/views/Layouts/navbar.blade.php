<nav style="position:sticky;top:0;z-index:60;background:rgba(255,255,255,0.85);backdrop-filter:blur(10px);border-bottom:1px solid #e5e7eb;box-shadow:0 2px 8px rgba(0,0,0,.05);">
  <div style="max-width:1200px;margin:0 auto;padding:10px 20px;display:flex;align-items:center;gap:16px;">

    <!-- Bloque izquierdo: Logo + Marca -->
    <a href="{{ route('products.index') }}" style="display:inline-flex;align-items:center;gap:10px;text-decoration:none;">
      <div style="height:36px;width:36px;border-radius:10px;background:#111827;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;box-shadow:0 1px 2px rgba(0,0,0,.08);">
        M
      </div>
      <div style="display:flex;flex-direction:column;line-height:1;">
        <span style="font-size:16px;font-weight:800;color:#0f172a;">Mikis Shop</span>
        <span style="font-size:11px;color:#64748b;">Economico!</span>
      </div>
    </a>

    <!-- Divider sutil -->
    <div style="height:28px;width:1px;background:#e5e7eb;"></div>

    <!-- Buscador compacto (opcional, puedes quitarlo) -->
    <form action="#" method="get" style="flex:1;max-width:480px;display:flex;align-items:center;gap:8px;">
      <div style="position:relative;flex:1;">
        <span style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;">⌕</span>
        <input type="search" name="q" placeholder="Buscar productos, marcas o categorías"
               style="width:100%;padding:8px 12px 8px 28px;border:1px solid #e2e8f0;border-radius:10px;background:#ffffff;color:#0f172a;font-size:13px;outline:none;transition:box-shadow .15s,border-color .15s;"
               onfocus="this.style.borderColor='#111827'; this.style.boxShadow='0 0 0 3px rgba(17,24,39,.08)';"
               onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none';">
      </div>
    </form>

    <!-- Bloque derecho: enlaces y acciones -->
    <div style="display:flex;align-items:center;gap:12px;">

      <a href="{{ url('/') }}"
         style="padding:8px 10px;border-radius:10px;color:#475569;font-weight:600;text-decoration:none;transition:background .15s,color .15s;"
         onmouseover="this.style.background='#f1f5f9';this.style.color='#111827';"
         onmouseout="this.style.background='transparent';this.style.color='#475569';">
        Inicio
      </a>

      <a href="{{ url('/admin') }}"
         style="padding:8px 10px;border-radius:10px;color:#475569;font-weight:600;text-decoration:none;transition:background .15s,color .15s;"
         onmouseover="this.style.background='#f1f5f9';this.style.color='#111827';"
         onmouseout="this.style.background='transparent';this.style.color='#475569';">
        Admin
      </a>

      <!-- CTA a la tienda -->
      <a href="{{ route('products.index') }}"
         style="display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:10px;border:1px solid #111827;background:#111827;color:#ffffff;font-weight:700;text-decoration:none;box-shadow:0 1px 2px rgba(0,0,0,.06);"
         onmouseover="this.style.background='#1f2937';"
         onmouseout="this.style.background='#111827';"
         onfocus="this.style.boxShadow='0 0 0 3px rgba(17,24,39,.25)';"
         onblur="this.style.boxShadow='0 1px 2px rgba(0,0,0,.06)';">
        Ir a la tienda
      </a>

      @guest
        <a href="{{ route('login') }}"
           style="padding:8px 10px;border-radius:10px;color:#475569;font-weight:600;text-decoration:none;transition:background .15s,color .15s;"
           onmouseover="this.style.background='#f1f5f9';this.style.color='#111827';"
           onmouseout="this.style.background='transparent';this.style.color='#475569';">
          Iniciar sesión
        </a>

        <a href="{{ route('register') }}"
           style="padding:8px 12px;border-radius:10px;border:1px solid #e2e8f0;background:#ffffff;color:#111827;font-weight:700;text-decoration:none;transition:box-shadow .15s,border-color .15s;"
           onmouseover="this.style.borderColor='#111827';"
           onmouseout="this.style.borderColor='#e2e8f0';">
          Registrarse
        </a>
      @else
        <!-- Dropdown de usuario rediseñado -->
        <div style="position:relative;display:inline-block;">
          <button type="button" aria-haspopup="true" aria-expanded="false" id="userMenuBtn"
                  onclick="(function(btn){var m=document.getElementById('userMenu');var o=m.style.display==='block';m.style.display=o?'none':'block';btn.setAttribute('aria-expanded',!o)})(this)"
                  onblur="setTimeout(function(){var m=document.getElementById('userMenu'); if(m){m.style.display='none'; document.getElementById('userMenuBtn').setAttribute('aria-expanded','false')}},150)"
                  style="display:inline-flex;align-items:center;gap:8px;padding:8px 10px;border:1px solid #e2e8f0;border-radius:12px;background:#ffffff;color:#334155;font-weight:700;cursor:pointer;transition:box-shadow .15s,border-color .15s;">
            <div style="height:28px;width:28px;border-radius:9999px;background:#f1f5f9;color:#475569;display:flex;align-items:center;justify-content:center;font-weight:700;">
              {{ mb_substr(Auth::user()->name,0,1,'UTF-8') }}
            </div>
            <span style="max-width:140px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ Auth::user()->name }}</span>
            <svg style="width:16px;height:16px;color:#64748b" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>

          <div id="userMenu" role="menu" aria-labelledby="userMenuBtn"
               style="display:none;position:absolute;right:0;margin-top:8px;width:210px;background:#ffffff;border:1px solid #e5e7eb;border-radius:12px;box-shadow:0 12px 28px rgba(0,0,0,.12);padding:6px 0;z-index:70;">
            <div style="padding:8px 12px;border-bottom:1px solid #f1f5f9;">
              <div style="font-size:12px;color:#64748b;">Conectado como</div>
              <div style="font-size:13px;color:#0f172a;font-weight:700;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ Auth::user()->name }}</div>
            </div>

            <a href="{{ route('home') }}"
               style="display:flex;align-items:center;gap:8px;padding:10px 12px;color:#374151;font-size:14px;text-decoration:none;"
               onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              Perfil
            </a>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="display:flex;align-items:center;gap:8px;padding:10px 12px;color:#374151;font-size:14px;text-decoration:none;"
               onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
              Cerrar sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
          </div>
        </div>
      @endguest
    </div>
  </div>
</nav>
