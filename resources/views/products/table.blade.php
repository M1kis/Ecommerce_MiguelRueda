@extends('admin.layouts.app')

@section('content')
<div style="padding:24px;">
  <div style="max-width:1200px;margin:0 auto;">
    <div style="display:flex;align-items:baseline;justify-content:space-between;gap:16px;margin-bottom:16px;">
      <div>
        <h3 style="margin:0;font-size:20px;line-height:1.2;font-weight:700;color:#0f172a;">Products List</h3>
        <p style="margin:4px 0 0 0;font-size:13px;color:#475569;">Gestiona el catálogo de productos, sus precios y relaciones.</p>
      </div>
      <div>
        <a href="{{ route('admin.products.create') }}"
           style="display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:10px;background:#111827;color:#fff;text-decoration:none;font-weight:600;box-shadow:0 1px 2px rgba(0,0,0,.08);">
          <span class="material-symbols-rounded" style="font-size:18px;line-height:1;">add</span>
          Add New Product
        </a>
      </div>
    </div>

    <div style="border-radius:14px;border:1px solid #e5e7eb;background:#ffffff;box-shadow:0 1px 3px rgba(0,0,0,.06),0 1px 2px rgba(0,0,0,.03);overflow:hidden;">
      <div style="padding:14px 16px;border-bottom:1px solid #f1f5f9;background:#f8fafc;">
        <div style="display:flex;align-items:center;justify-content:space-between;">
          <span style="font-size:14px;color:#334155;font-weight:600;">Productos</span>
          <span style="font-size:12px;color:#64748b;">Total: {{ $products->total() }}</span>
        </div>
      </div>

      <div style="width:100%;overflow:auto;max-height:60vh;">
        <table style="width:100%;border-collapse:separate;border-spacing:0;">
          <thead>
            <tr style="background:#f8fafc;position:sticky;top:0;z-index:1;">
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:70px;">Id</th>
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:200px;">Name</th>
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:120px;">Price</th>
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:160px;">Brand</th>
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:160px;">Category</th>
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:160px;">Created</th>
              <th scope="col" style="text-align:left;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:160px;">Updated</th>
              <th scope="col" style="text-align:right;padding:12px 10px;font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:#64748b;border-bottom:1px solid #e2e8f0;min-width:120px;"></th>
            </tr>
          </thead>

          <tbody>
            @foreach($products as $idx => $product)
              <tr style="background:{{ $idx % 2 === 0 ? '#ffffff' : '#fcfcfd' }};transition:background .2s ease;"
                  onmouseover="this.style.backgroundColor='#f5faff'"
                  onmouseout="this.style.backgroundColor='{{ $idx % 2 === 0 ? '#ffffff' : '#fcfcfd' }}'">
                <td style="padding:12px 10px;color:#0f172a;font-size:14px;">{{ $product->id }}</td>
                <td style="padding:12px 10px;color:#0f172a;font-size:14px;font-weight:600;">{{ $product->name }}</td>

                <td style="padding:12px 10px;color:#0f172a;font-size:14px;">
                  ${{ number_format((float)$product->price, 2, '.', ',') }}
                </td>

                {{-- Mostrar nombre de la marca si existe la relación belongsTo en Product --}}
                <td style="padding:12px 10px;color:#334155;font-size:14px;">
                  {{ optional($product->brand)->name ?? '—' }}
                </td>

                {{-- Mostrar nombre de la categoría si existe la relación belongsTo en Product --}}
                <td style="padding:12px 10px;color:#334155;font-size:14px;">
                  {{ optional($product->category)->name ?? '—' }}
                </td>

                <td style="padding:12px 10px;color:#334155;font-size:13px;">{{ $product->created_at }}</td>
                <td style="padding:12px 10px;color:#334155;font-size:13px;">{{ $product->updated_at }}</td>

                <td style="padding:12px 10px;text-align:right;">
                  <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                        style="display:inline-block;margin:0;"
                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            style="display:inline-flex;align-items:center;gap:6px;padding:8px 10px;border:1px solid #fecaca;border-radius:10px;background:#fff7f7;color:#b91c1c;font-size:13px;font-weight:600;cursor:pointer;box-shadow:0 1px 1px rgba(0,0,0,.04);">
                      <span class="material-symbols-rounded" style="font-size:16px;line-height:1;">delete</span>
                      Eliminar
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <td colspan="8" style="padding:10px;border-top:1px solid #e2e8f0;background:#fafafa;">
                <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
                  <span style="font-size:12px;color:#64748b;">Mostrando {{ $products->firstItem() }}–{{ $products->lastItem() }} de {{ $products->total() }}</span>
                  <div style="display:flex;align-items:center;gap:6px;">{{ $products->links() }}</div>
                </div>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
