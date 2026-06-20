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
            // Correas
            ['producto' => 'Correas', 'nombre' => 'Correas en V', 'descripcion' => 'Correas industriales de alta resistencia para transmisión de potencia', 'descripcion_corta' => 'Transmisión de potencia'],
            ['producto' => 'Correas', 'nombre' => 'Correas Dentadas', 'descripcion' => 'Correas sincronizadas para transmisión precisa', 'descripcion_corta' => 'Transmisión precisa'],
            ['producto' => 'Correas', 'nombre' => 'Correas Variadoras', 'descripcion' => 'Correas para sistemas de velocidad variable', 'descripcion_corta' => 'Velocidad variable'],
            ['producto' => 'Correas', 'nombre' => 'Correas Acanaladas', 'descripcion' => 'Correas multicanales para alta eficiencia', 'descripcion_corta' => 'Alta eficiencia'],

            // Mangueras
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras Hidráulicas', 'descripcion' => 'Mangueras de alta presión para sistemas hidráulicos industriales', 'descripcion_corta' => 'Alta presión'],
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras de Succión y Descarga', 'descripcion' => 'Mangueras para transferencia de fluidos', 'descripcion_corta' => 'Transferencia de fluidos'],
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras Multiusos', 'descripcion' => 'Mangueras versátiles para múltiples aplicaciones', 'descripcion_corta' => 'Versátiles'],
            ['producto' => 'Mangueras', 'nombre' => 'Mangueras Neumáticas', 'descripcion' => 'Mangueras para sistemas de aire comprimido', 'descripcion_corta' => 'Aire comprimido'],

            // Rodamientos
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos de Rodillos', 'descripcion' => 'Rodamientos para cargas pesadas', 'descripcion_corta' => 'Cargas pesadas'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos de Bolas', 'descripcion' => 'Rodamientos de precisión para alta velocidad', 'descripcion_corta' => 'Alta velocidad'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos de Agujas', 'descripcion' => 'Rodamientos compactos para espacios reducidos', 'descripcion_corta' => 'Compactos'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos Axiales', 'descripcion' => 'Rodamientos para cargas axiales', 'descripcion_corta' => 'Cargas axiales'],
            ['producto' => 'Rodamientos', 'nombre' => 'Rodamientos Lineales', 'descripcion' => 'Rodamientos para movimiento lineal', 'descripcion_corta' => 'Movimiento lineal'],

            // Retenes, Sellos y O-rings
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Retenes', 'descripcion' => 'Elementos de sellado para ejes rotativos', 'descripcion_corta' => 'Sellado de ejes'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Sellos Mecánicos', 'descripcion' => 'Sellos para bombas y equipos rotativos', 'descripcion_corta' => 'Bombas y equipos'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'O-Rings', 'descripcion' => 'Juntas tóricas para sellado estático y dinámico', 'descripcion_corta' => 'Juntas tóricas'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Sellos Hidráulicos', 'descripcion' => 'Sellos para sistemas hidráulicos', 'descripcion_corta' => 'Sistemas hidráulicos'],
            ['producto' => 'Retenes, Sellos y O-rings', 'nombre' => 'Sellos Neumáticos', 'descripcion' => 'Sellos para sistemas neumáticos', 'descripcion_corta' => 'Sistemas neumáticos'],

            // Bandas Transportadoras
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Lisas', 'descripcion' => 'Bandas para cargas pesadas, minería e industria', 'descripcion_corta' => 'Cargas pesadas'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Nervadas', 'descripcion' => 'Bandas para cargas pesadas, minería e industria', 'descripcion_corta' => 'Cargas pesadas'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Verticales', 'descripcion' => 'Bandas para cargas pesadas, minería e industria', 'descripcion_corta' => 'Cargas pesadas'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas con Bordes', 'descripcion' => 'Bandas para cargas pesadas, minería e industria', 'descripcion_corta' => 'Cargas pesadas'],
            ['producto' => 'Bandas Transportadoras Pesadas', 'nombre' => 'Bandas Corrugadas', 'descripcion' => 'Bandas para cargas pesadas, minería e industria', 'descripcion_corta' => 'Cargas pesadas'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas Sintenticas', 'descripcion' => 'Bandas para industria ligera', 'descripcion_corta' => 'Industria ligera'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas Modulares', 'descripcion' => 'Bandas para industria ligera', 'descripcion_corta' => 'Industria ligera'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas PTFE', 'descripcion' => 'Bandas para industria ligera', 'descripcion_corta' => 'Industria ligera'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas Homogeneas', 'descripcion' => 'Bandas para industria ligera', 'descripcion_corta' => 'Industria ligera'],
            ['producto' => 'Bandas Transportadoras Livianas', 'nombre' => 'Bandas de Caucho Ligeras', 'descripcion' => 'Bandas para industria ligera', 'descripcion_corta' => 'Industria ligera'],

            // Cadenas
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas de Rodillos de Precisión', 'descripcion' => 'Cadenas para transmisión de potencia', 'descripcion_corta' => 'Transmisión'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas de Acero Inoxidable', 'descripcion' => 'Cadenas resistentes a la corrosión', 'descripcion_corta' => 'Resistentes'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas de Transmisión', 'descripcion' => 'Cadenas para transmisión industrial', 'descripcion_corta' => 'Industrial'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas con Transportador', 'descripcion' => 'Cadenas para sistemas de transporte', 'descripcion_corta' => 'Transporte'],
            ['producto' => 'Cadenas', 'nombre' => 'Cadenas Agrícolas', 'descripcion' => 'Cadenas para maquinaria agrícola', 'descripcion_corta' => 'Agrícola'],

            // Poleas
            ['producto' => 'Poleas', 'nombre' => 'Poleas en V de Taladro Cónico y Cilíndrico', 'descripcion' => 'Poleas para correas en V', 'descripcion_corta' => 'Correas en V'],
            ['producto' => 'Poleas', 'nombre' => 'Poleas Sincrónicas', 'descripcion' => 'Poleas para correas dentadas', 'descripcion_corta' => 'Correas dentadas'],
            ['producto' => 'Poleas', 'nombre' => 'Poleas MI-Lock', 'descripcion' => 'Poleas con sistema de bloqueo MI-Lock', 'descripcion_corta' => 'Sistema MI-Lock'],

            // Piñones
            ['producto' => 'Piñones', 'nombre' => 'Piñones de taladro cónico', 'descripcion' => 'Piñones con ajuste cónico', 'descripcion_corta' => 'Ajuste cónico'],
            ['producto' => 'Piñones', 'nombre' => 'Piñones con agujero piloto', 'descripcion' => 'Piñones para mecanizado personalizado', 'descripcion_corta' => 'Mecanizado'],
            ['producto' => 'Piñones', 'nombre' => 'Piñones simples de taladro cónico para 2 cadenas', 'descripcion' => 'Piñones dobles para transmisión', 'descripcion_corta' => 'Transmisión doble'],

            // Niples, Conexiones y Conectores
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Niples Hidráulicos', 'descripcion' => 'Conexiones para sistemas hidráulicos', 'descripcion_corta' => 'Hidráulicos'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Niples de Cobre', 'descripcion' => 'Conexiones de cobre para diversas aplicaciones', 'descripcion_corta' => 'Cobre'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Conexiones Rápidas', 'descripcion' => 'Conexiones de acople rápido', 'descripcion_corta' => 'Acople rápido'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Adaptadores', 'descripcion' => 'Adaptadores para diferentes configuraciones', 'descripcion_corta' => 'Adaptación'],
            ['producto' => 'Niples, Conexiones y Conectores', 'nombre' => 'Conectores Rápidos', 'descripcion' => 'Conectores para conexión rápida', 'descripcion_corta' => 'Conexión rápida'],

            // Cilindros
            ['producto' => 'Cilindros', 'nombre' => 'Cilindros Neumáticos', 'descripcion' => 'Cilindros para sistemas neumáticos', 'descripcion_corta' => 'Neumáticos'],
            ['producto' => 'Cilindros', 'nombre' => 'Cilindros HTR (Tirantes)', 'descripcion' => 'Cilindros con diseño de tirantes', 'descripcion_corta' => 'Tirantes'],
            ['producto' => 'Cilindros', 'nombre' => 'Cilindros HCW (Patentado)', 'descripcion' => 'Cilindros con diseño patentado', 'descripcion_corta' => 'Patentado'],

            // Cangilones
            ['producto' => 'Cangilones', 'nombre' => 'Cangilones HD Stax (Heavy Duty)', 'descripcion' => 'Cangilones de alta resistencia', 'descripcion_corta' => 'Alta resistencia'],
            ['producto' => 'Cangilones', 'nombre' => 'Cangilones de Nylon', 'descripcion' => 'Cangilones ligeros de nylon', 'descripcion_corta' => 'Ligeros'],
            ['producto' => 'Cangilones', 'nombre' => 'Cangilones de Poliuretano', 'descripcion' => 'Cangilones resistentes al desgaste', 'descripcion_corta' => 'Resistentes'],
            ['producto' => 'Cangilones', 'nombre' => 'Pernos', 'descripcion' => 'Pernos para fijación de cangilones', 'descripcion_corta' => 'Fijación'],
            ['producto' => 'Cangilones', 'nombre' => 'Grapas de Empalme Mecánico', 'descripcion' => 'Grapas para unión de bandas', 'descripcion_corta' => 'Unión'],

            // Cardanes
            ['producto' => 'Cardanes', 'nombre' => 'Cardanes Agrícolas', 'descripcion' => 'Cardanes para maquinaria agrícola', 'descripcion_corta' => 'Agrícola'],

            // Cajas de Comandos
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comando de 1 Palanca', 'descripcion' => 'Caja de comando con una palanca', 'descripcion_corta' => '1 Palanca'],
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comandos de 2 Palancas', 'descripcion' => 'Caja de comando con dos palancas', 'descripcion_corta' => '2 Palancas'],
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comandos de 3 Palancas', 'descripcion' => 'Caja de comando con tres palancas', 'descripcion_corta' => '3 Palancas'],
            ['producto' => 'Cajas de Comandos', 'nombre' => 'Caja de Comandos de 4 Palancas', 'descripcion' => 'Caja de comando con cuatro palancas', 'descripcion_corta' => '4 Palancas'],

            // Abrazaderas
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas Galvanizadas', 'descripcion' => 'Abrazaderas con recubrimiento galvanizado', 'descripcion_corta' => 'Galvanizadas'],
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas Inoxidables', 'descripcion' => 'Abrazaderas de acero inoxidable', 'descripcion_corta' => 'Inoxidables'],
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas de Tornillo', 'descripcion' => 'Abrazaderas con sistema de tornillo', 'descripcion_corta' => 'Tornillo'],
            ['producto' => 'Abrazaderas', 'nombre' => 'Abrazaderas de Alambre', 'descripcion' => 'Abrazaderas de alambre', 'descripcion_corta' => 'Alambre'],
        ];

        $orden = 1;
        foreach ($categorias as $cat) {
            $producto = Producto::where('nombre', $cat['producto'])->first();

            // Validación: Verificar si el producto existe
            if (!$producto) {
                $this->command->error("❌ Producto no encontrado: '{$cat['producto']}'");
                $this->command->error("   Verifica que ProductoSeeder se haya ejecutado correctamente");
                continue; // Saltar esta categoría
            }

            Categoria::create([
                'producto_id' => $producto->id,
                'nombre' => $cat['nombre'],
                'slug' => Str::slug($cat['nombre']),
                'imagen' => 'storage/producto/categoria/' . Str::slug($cat['nombre']) . '.jpg',
                'descripcion' => $cat['descripcion'],
                'descripcion_corta' => $cat['descripcion_corta'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }

        $this->command->info("✅ " . count($categorias) . " categorías procesadas");
    }
}
