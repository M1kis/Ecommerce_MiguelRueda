<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Datos del producto
            $table->string('name');
            $table->text('description');
            // Precio amplio: hasta 9,999,999,999.99 (12 dígitos totales, 2 decimales)
            $table->decimal('price', 12, 2);
            // Evitar guiones en el nombre de columna (antes 'url-image')
            $table->string('url_image')->nullable();

            // Claves foráneas
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            // La tabla es 'brands' (plural)
            $table->foreignId('brand_id')->constrained('brand')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};