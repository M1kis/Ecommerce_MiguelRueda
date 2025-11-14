<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    private $products = [
        // Phones
        ['name' => 'iPhone 15 Pro Max', 'description' => 'Pantalla Super Retina XDR de 6.7 pulgadas, chip A17 Pro, cámara de 48MP, 256GB de almacenamiento.', 'price' => 1199.99, 'category' => 'Phones', 'brand' => 'Apple'],
        ['name' => 'Samsung Galaxy S24 Ultra', 'description' => 'Pantalla Dynamic AMOLED 2X de 6.8 pulgadas, cámara de 200MP, S Pen incluido, 512GB.', 'price' => 1299.99, 'category' => 'Phones', 'brand' => 'Samsung'],
        ['name' => 'iPhone 14', 'description' => 'Pantalla Super Retina XDR de 6.1 pulgadas, chip A15 Bionic, cámara dual de 12MP, 128GB.', 'price' => 699.99, 'category' => 'Phones', 'brand' => 'Apple'],
        ['name' => 'Samsung Galaxy A54', 'description' => 'Pantalla Super AMOLED de 6.4 pulgadas, cámara triple de 50MP, 128GB, resistencia al agua IP67.', 'price' => 449.99, 'category' => 'Phones', 'brand' => 'Samsung'],
        ['name' => 'Sony Xperia 1 V', 'description' => 'Pantalla 4K HDR OLED de 6.5 pulgadas, cámara triple de 48MP, grabación 4K 120fps.', 'price' => 1199.99, 'category' => 'Phones', 'brand' => 'Sony'],
        
        // Computers
        ['name' => 'MacBook Pro 16" M3 Pro', 'description' => 'Chip M3 Pro, 18GB RAM, SSD 512GB, pantalla Liquid Retina XDR de 16.2 pulgadas.', 'price' => 2499.99, 'category' => 'Computers', 'brand' => 'Apple'],
        ['name' => 'Dell XPS 15', 'description' => 'Intel Core i7, 16GB RAM, SSD 512GB, pantalla OLED 15.6" 4K, NVIDIA RTX 4050.', 'price' => 1899.99, 'category' => 'Computers', 'brand' => 'Dell'],
        ['name' => 'HP Spectre x360', 'description' => 'Intel Core i7, 16GB RAM, SSD 1TB, pantalla táctil 13.5" OLED, convertible 2 en 1.', 'price' => 1499.99, 'category' => 'Computers', 'brand' => 'HP'],
        ['name' => 'Lenovo ThinkPad X1 Carbon', 'description' => 'Intel Core i7, 16GB RAM, SSD 512GB, pantalla 14" 2.8K, teclado retroiluminado.', 'price' => 1699.99, 'category' => 'Computers', 'brand' => 'Lenovo'],
        ['name' => 'Asus ROG Zephyrus G15', 'description' => 'AMD Ryzen 9, 32GB RAM, SSD 1TB, pantalla 15.6" QHD 165Hz, NVIDIA RTX 4070.', 'price' => 1999.99, 'category' => 'Computers', 'brand' => 'Asus'],
        ['name' => 'Acer Predator Helios 16', 'description' => 'Intel Core i9, 32GB RAM, SSD 1TB, pantalla 16" QHD 165Hz, NVIDIA RTX 4080.', 'price' => 2299.99, 'category' => 'Computers', 'brand' => 'Acer'],
        ['name' => 'Microsoft Surface Laptop 5', 'description' => 'Intel Core i7, 16GB RAM, SSD 512GB, pantalla táctil 13.5" PixelSense.', 'price' => 1299.99, 'category' => 'Computers', 'brand' => 'Microsoft'],
        
        // TVs
        ['name' => 'Samsung QLED 65" QN90C', 'description' => 'QLED 4K UHD, HDR10+, Smart TV, Quantum HDR 24x, procesador Neural Quantum 4K.', 'price' => 1799.99, 'category' => 'TVs', 'brand' => 'Samsung'],
        ['name' => 'LG OLED 55" C3', 'description' => 'OLED 4K, HDR10, Smart TV webOS, procesador α9 AI Processor Gen6, Dolby Vision IQ.', 'price' => 1299.99, 'category' => 'TVs', 'brand' => 'LG'],
        ['name' => 'Sony Bravia XR 75" X90L', 'description' => 'LED 4K, Cognitive Processor XR, Smart TV Google TV, Full Array LED, Dolby Vision.', 'price' => 1999.99, 'category' => 'TVs', 'brand' => 'Sony'],
        ['name' => 'Samsung The Frame 55"', 'description' => 'QLED 4K, modo arte, Smart TV, diseño ultra delgado, marcos intercambiables.', 'price' => 1499.99, 'category' => 'TVs', 'brand' => 'Samsung'],
        
        // Cameras
        ['name' => 'Sony Alpha 7 IV', 'description' => 'Cámara mirrorless full-frame, sensor de 33MP, grabación 4K 60p, estabilización 5 ejes.', 'price' => 2499.99, 'category' => 'Cameras', 'brand' => 'Sony'],
        ['name' => 'Sony Alpha 7R V', 'description' => 'Cámara mirrorless full-frame, sensor de 61MP, grabación 4K 60p, estabilización IBIS avanzada.', 'price' => 3899.99, 'category' => 'Cameras', 'brand' => 'Sony'],
        ['name' => 'Sony Alpha 7C', 'description' => 'Cámara mirrorless full-frame compacta, sensor de 24MP, grabación 4K, diseño ligero.', 'price' => 1799.99, 'category' => 'Cameras', 'brand' => 'Sony'],
        
        // Audio
        ['name' => 'Sony WH-1000XM5', 'description' => 'Audífonos inalámbricos con cancelación de ruido, batería de 30 horas, sonido Hi-Res.', 'price' => 399.99, 'category' => 'Audio', 'brand' => 'Sony'],
        ['name' => 'Apple AirPods Pro 2', 'description' => 'Audífonos inalámbricos con cancelación activa de ruido, chip H2, resistencia al agua IPX4.', 'price' => 249.99, 'category' => 'Audio', 'brand' => 'Apple'],
        ['name' => 'Samsung Galaxy Buds2 Pro', 'description' => 'Audífonos inalámbricos, cancelación de ruido inteligente, sonido 360 Audio, IPX7.', 'price' => 229.99, 'category' => 'Audio', 'brand' => 'Samsung'],
        ['name' => 'Sony WF-1000XM5', 'description' => 'Earbuds inalámbricos con cancelación de ruido, batería de 24 horas, sonido Hi-Res Audio.', 'price' => 299.99, 'category' => 'Audio', 'brand' => 'Sony'],
        
        // Wearables
        ['name' => 'Apple Watch Series 9', 'description' => 'Reloj inteligente, pantalla Always-On Retina, GPS, resistencia al agua 50m, chip S9.', 'price' => 399.99, 'category' => 'Wearables', 'brand' => 'Apple'],
        ['name' => 'Samsung Galaxy Watch 6 Classic', 'description' => 'Reloj inteligente, pantalla Super AMOLED, GPS, resistencia al agua 5ATM, batería de 40 horas.', 'price' => 349.99, 'category' => 'Wearables', 'brand' => 'Samsung'],
        
        // Gaming
        ['name' => 'PlayStation 5', 'description' => 'Consola de videojuegos, SSD ultra rápido, ray tracing, 4K 120fps, control DualSense.', 'price' => 499.99, 'category' => 'Gaming', 'brand' => 'Sony'],
        ['name' => 'Xbox Series X', 'description' => 'Consola de videojuegos, 4K 120fps, ray tracing, SSD de 1TB, retrocompatibilidad.', 'price' => 499.99, 'category' => 'Gaming', 'brand' => 'Microsoft'],
        ['name' => 'PlayStation 5 Digital Edition', 'description' => 'Consola de videojuegos sin lector de discos, SSD ultra rápido, ray tracing, 4K 120fps.', 'price' => 399.99, 'category' => 'Gaming', 'brand' => 'Sony'],
        
        // Networking
        ['name' => 'ASUS RT-AX88U Pro', 'description' => 'Router WiFi 6, velocidad hasta 6000 Mbps, cobertura amplia, seguridad avanzada.', 'price' => 299.99, 'category' => 'Networking', 'brand' => 'Asus'],
        ['name' => 'ASUS RT-AX86U', 'description' => 'Router WiFi 6, velocidad hasta 5700 Mbps, 4 antenas, puertos Gigabit, gaming optimizado.', 'price' => 249.99, 'category' => 'Networking', 'brand' => 'Asus'],
        
        // Accessories
        ['name' => 'Apple Magic Keyboard', 'description' => 'Teclado inalámbrico, retroiluminado, batería recargable, diseño compacto.', 'price' => 149.99, 'category' => 'Accessories', 'brand' => 'Apple'],
        ['name' => 'Apple Magic Mouse', 'description' => 'Mouse inalámbrico, superficie Multi-Touch, batería recargable, diseño ergonómico.', 'price' => 79.99, 'category' => 'Accessories', 'brand' => 'Apple'],
        ['name' => 'Samsung Portable SSD T7', 'description' => 'SSD externo 1TB, velocidad hasta 1050 MB/s, diseño compacto, resistencia a caídas.', 'price' => 119.99, 'category' => 'Accessories', 'brand' => 'Samsung'],
        ['name' => 'Samsung USB-C Hub', 'description' => 'Hub multipuerto, HDMI 4K, USB 3.0, lector de tarjetas, carga rápida, diseño compacto.', 'price' => 49.99, 'category' => 'Accessories', 'brand' => 'Samsung'],
    ];

    public function definition(): array
    {
        $product = $this->faker->randomElement($this->products);
        
        // Obtener categoría y marca por nombre
        $category = Category::where('name', $product['category'])->first();
        $brand = Brand::where('name', $product['brand'])->first();
        
        // Si no existen, usar aleatorias
        if (!$category) {
            $category = Category::inRandomOrder()->first();
        }
        if (!$brand) {
            $brand = Brand::inRandomOrder()->first();
        }
        
        // Generar URL de imagen aleatoria usando Unsplash
        $imageUrls = [
            'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=600&fit=crop', // Electronics
            'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800&h=600&fit=crop', // Watch
            'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&h=600&fit=crop', // Shoes
            'https://images.unsplash.com/photo-1503602642458-232111445657?w=800&h=600&fit=crop', // Tech
            'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=800&h=600&fit=crop', // Gaming
            'https://images.unsplash.com/photo-1498049794561-7780e7231661?w=800&h=600&fit=crop', // Laptop
            'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&h=600&fit=crop', // Phone
            'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=800&h=600&fit=crop', // Camera
            'https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=800&h=600&fit=crop', // Headphones
            'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=800&h=600&fit=crop', // Glasses
            'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800&h=600&fit=crop', // TV
            'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&h=600&fit=crop', // Computer
            'https://images.unsplash.com/photo-1556656793-08538906a9f8?w=800&h=600&fit=crop', // Keyboard
            'https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?w=800&h=600&fit=crop', // Tablet
            'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?w=800&h=600&fit=crop', // Speaker
        ];
        
        return [
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'brand_id' => $brand->id ?? Brand::factory(),
            'category_id' => $category->id ?? Category::factory(),
            'url_image' => $this->faker->randomElement($imageUrls),
        ];
    }
}
