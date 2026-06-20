<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            // Correas - uso viene de la antigua descripcion_corta, descripcion_corta viene de la antigua descripcion
            ['producto' => 'Correas', 'nombre' => 'Correas en V', 'uso' => 'Transmisión de potencia', 'descripcion_corta' => 'Correas industriales de alta resistencia para transmisión de potencia', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Correas', 'nombre' => 'Correas Dentadas', 'uso' => 'Transmisión precisa', 'descripcion_corta' => 'Correas sincronizadas para transmisión precisa', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Correas', 'nombre' => 'Correas Variadoras', 'uso' => 'Velocidad variable', 'descripcion_corta' => 'Correas para sistemas de velocidad variable', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Correas', 'nombre' => 'Correas Acanaladas', 'uso' => 'Alta eficiencia', 'descripcion_corta' => 'Correas multicanales para alta eficiencia', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Mangueras
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras Hidráulicas', 'uso' => 'Alta presión', 'descripcion_corta' => 'Mangueras de alta presión para sistemas hidráulicos industriales', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras de Succión y Descarga', 'uso' => 'Transferencia de fluidos', 'descripcion_corta' => 'Mangueras para transferencia de fluidos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras Multiusos', 'uso' => 'Versátiles', 'descripcion_corta' => 'Mangueras versátiles para múltiples aplicaciones', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras Neumáticas', 'uso' => 'Aire comprimido', 'descripcion_corta' => 'Mangueras para sistemas de aire comprimido', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Rodamientos
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos de Rodillos', 'uso' => 'Cargas pesadas', 'descripcion_corta' => 'Rodamientos para cargas pesadas', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos de Bolas', 'uso' => 'Alta velocidad', 'descripcion_corta' => 'Rodamientos de precisión para alta velocidad', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos de Agujas', 'uso' => 'Compactos', 'descripcion_corta' => 'Rodamientos compactos para espacios reducidos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos Axiales', 'uso' => 'Cargas axiales', 'descripcion_corta' => 'Rodamientos para cargas axiales', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos Lineales', 'uso' => 'Movimiento lineal', 'descripcion_corta' => 'Rodamientos para movimiento lineal', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Retenes, Sellos y O-rings
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Retenes', 'uso' => 'Sellado de ejes', 'descripcion_corta' => 'Elementos de sellado para ejes rotativos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Sellos Mecánicos', 'uso' => 'Bombas y equipos', 'descripcion_corta' => 'Sellos para bombas y equipos rotativos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'O-Rings', 'uso' => 'Juntas tóricas', 'descripcion_corta' => 'Juntas tóricas para sellado estático y dinámico', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Sellos Hidráulicos', 'uso' => 'Sistemas hidráulicos', 'descripcion_corta' => 'Sellos para sistemas hidráulicos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Sellos Neumáticos', 'uso' => 'Sistemas neumáticos', 'descripcion_corta' => 'Sellos para sistemas neumáticos', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Bandas Transportadoras Pesadas
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Lisas', 'uso' => 'Cargas pesadas', 'descripcion_corta' => 'Bandas para cargas pesadas, minería e industria', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Nervadas', 'uso' => 'Cargas pesadas', 'descripcion_corta' => 'Bandas para cargas pesadas, minería e industria', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Verticales', 'uso' => 'Cargas pesadas', 'descripcion_corta' => 'Bandas para cargas pesadas, minería e industria', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas con Bordes', 'uso' => 'Cargas pesadas', 'descripcion_corta' => 'Bandas para cargas pesadas, minería e industria', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Corrugadas', 'uso' => 'Cargas pesadas', 'descripcion_corta' => 'Bandas para cargas pesadas, minería e industria', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Bandas Transportadoras Livianas
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas Sintenticas', 'uso' => 'Industria ligera', 'descripcion_corta' => 'Bandas para industria ligera', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas Modulares', 'uso' => 'Industria ligera', 'descripcion_corta' => 'Bandas para industria ligera', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas PTFE', 'uso' => 'Industria ligera', 'descripcion_corta' => 'Bandas para industria ligera', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas Homogeneas', 'uso' => 'Industria ligera', 'descripcion_corta' => 'Bandas para industria ligera', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas de Caucho Ligeras', 'uso' => 'Industria ligera', 'descripcion_corta' => 'Bandas para industria ligera', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Cadenas
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas de Rodillos de Precisión', 'uso' => 'Transmisión', 'descripcion_corta' => 'Cadenas para transmisión de potencia', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas de Acero Inoxidable', 'uso' => 'Resistentes', 'descripcion_corta' => 'Cadenas resistentes a la corrosión', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas de Transmisión', 'uso' => 'Industrial', 'descripcion_corta' => 'Cadenas para transmisión industrial', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas con Transportador', 'uso' => 'Transporte', 'descripcion_corta' => 'Cadenas para sistemas de transporte', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas Agrícolas', 'uso' => 'Agrícola', 'descripcion_corta' => 'Cadenas para maquinaria agrícola', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Poleas
            ['producto' => 'Poleas', 'nombre' => 'Poleas en V de Taladro Cónico y Cilíndrico', 'uso' => 'Correas en V', 'descripcion_corta' => 'Poleas para correas en V', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Poleas', 'nombre' => 'Poleas Sincrónicas', 'uso' => 'Correas dentadas', 'descripcion_corta' => 'Poleas para correas dentadas', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Poleas', 'nombre' => 'Poleas MI-Lock', 'uso' => 'Sistema MI-Lock', 'descripcion_corta' => 'Poleas con sistema de bloqueo MI-Lock', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Piñones
            ['producto' => 'Piñones', 'nombre' => 'Piñones de taladro cónico', 'uso' => 'Ajuste cónico', 'descripcion_corta' => 'Piñones con ajuste cónico', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Piñones', 'nombre' => 'Piñones con agujero piloto', 'uso' => 'Mecanizado', 'descripcion_corta' => 'Piñones para mecanizado personalizado', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Piñones', 'nombre' => 'Piñones simples de taladro cónico para 2 cadenas', 'uso' => 'Transmisión doble', 'descripcion_corta' => 'Piñones dobles para transmisión', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Niples, Conexiones y Conectores
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Niples Hidráulicos', 'uso' => 'Hidráulicos', 'descripcion_corta' => 'Conexiones para sistemas hidráulicos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Niples de Cobre', 'uso' => 'Cobre', 'descripcion_corta' => 'Conexiones de cobre para diversas aplicaciones', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Conexiones Rápidas', 'uso' => 'Acople rápido', 'descripcion_corta' => 'Conexiones de acople rápido', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Adaptadores', 'uso' => 'Adaptación', 'descripcion_corta' => 'Adaptadores para diferentes configuraciones', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Conectores Rápidos', 'uso' => 'Conexión rápida', 'descripcion_corta' => 'Conectores para conexión rápida', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Cilindros
            ['producto' => 'Cilindros', 'nombre' => 'Cilindros Neumáticos', 'uso' => 'Neumáticos', 'descripcion_corta' => 'Cilindros para sistemas neumáticos', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cilindros', 'nombre' => 'Cilindros HTR (Tirantes)', 'uso' => 'Tirantes', 'descripcion_corta' => 'Cilindros con diseño de tirantes', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cilindros', 'nombre' => 'Cilindros HCW (Patentado)', 'uso' => 'Patentado', 'descripcion_corta' => 'Cilindros con diseño patentado', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Cangilones
            ['producto' => 'Cangilones', 'nombre' => 'Cangilones HD Stax (Heavy Duty)', 'uso' => 'Alta resistencia', 'descripcion_corta' => 'Cangilones de alta resistencia', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cangilones', 'nombre' => 'Cangilones de Nylon', 'uso' => 'Ligeros', 'descripcion_corta' => 'Cangilones ligeros de nylon', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cangilones', 'nombre' => 'Cangilones de Poliuretano', 'uso' => 'Resistentes', 'descripcion_corta' => 'Cangilones resistentes al desgaste', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cangilones', 'nombre' => 'Pernos', 'uso' => 'Fijación', 'descripcion_corta' => 'Pernos para fijación de cangilones', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cangilones', 'nombre' => 'Grapas de Empalme Mecánico', 'uso' => 'Unión', 'descripcion_corta' => 'Grapas para unión de bandas', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Cardanes
            ['producto' => 'Cardanes', 'nombre' => 'Cardanes Agrícolas', 'uso' => 'Agrícola', 'descripcion_corta' => 'Cardanes para maquinaria agrícola', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Cajas de Comandos
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comando de 1 Palanca', 'uso' => '1 Palanca', 'descripcion_corta' => 'Caja de comando con una palanca', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comandos de 2 Palancas', 'uso' => '2 Palancas', 'descripcion_corta' => 'Caja de comando con dos palancas', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comandos de 3 Palancas', 'uso' => '3 Palancas', 'descripcion_corta' => 'Caja de comando con tres palancas', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comandos de 4 Palancas', 'uso' => '4 Palancas', 'descripcion_corta' => 'Caja de comando con cuatro palancas', 'descripcion' => 'Aqui va la descripcion general papu'],

            // Abrazaderas
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas Galvanizadas', 'uso' => 'Galvanizadas', 'descripcion_corta' => 'Abrazaderas con recubrimiento galvanizado', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas Inoxidables', 'uso' => 'Inoxidables', 'descripcion_corta' => 'Abrazaderas de acero inoxidable', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas de Tornillo', 'uso' => 'Tornillo', 'descripcion_corta' => 'Abrazaderas con sistema de tornillo', 'descripcion' => 'Aqui va la descripcion general papu'],
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas de Alambre', 'uso' => 'Alambre', 'descripcion_corta' => 'Abrazaderas de alambre', 'descripcion' => 'Aqui va la descripcion general papu'],
        ];

        $orden = 1;
        foreach ($categorias as $cat) {
            $producto = Producto::where('nombre', $cat['producto'])->first();

            if (!$producto) {
                $this->command->error("❌ Producto no encontrado: '{$cat['producto']}'");
                continue;
            }

            Categoria::create([
                'producto_id' => $producto->id,
                'nombre' => $cat['nombre'],
                'slug' => Str::slug($cat['nombre']),
                'imagen' => 'storage/producto/categoria/' . Str::slug($cat['nombre']) . '.jpg',
                'uso' => $cat['uso'],
                'descripcion_corta' => $cat['descripcion_corta'],
                'descripcion' => $cat['descripcion'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }

        $this->command->info("✅ " . count($categorias) . " categorías procesadas");
    }
}
