<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        $heroes = [
            [
                'imagen' => 'hero/Industria.jpg',
                'titulo' => 'Soluciones Industriales Confiables',
                'subtitulo' => 'Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.',
                'badge_text' => 'Lider en Soluciones Industriales',
                'cta_primary_text' => 'Solicitar Asesoría',
                'cta_primary_href' => '/contact',
                'cta_secondary_text' => 'Ver Productos',
                'cta_secondary_href' => '/products',
            ],
            [
                'imagen' => 'hero/calidad.jpeg',
                'titulo' => 'Calidad SKF Garantizada',
                'subtitulo' => 'Fabricación autorizada SKF con los más altos estándares de calidad.',
                'badge_text' => 'Fabricante Autorizado',
                'cta_primary_text' => 'Conocer Más',
                'cta_primary_href' => '/services/fabricacion-de-sellos-skf',
                'cta_secondary_text' => 'Ver Productos',
                'cta_secondary_href' => '/products',
            ],
            [
                'imagen' => 'hero/Cinta transportadora Fabrica.jpeg',
                'titulo' => 'Bandas Transportadoras, Correas y Transmisiones de Alta Resistencia',
                'subtitulo' => 'Amplio stock en bandas transportadoras, correas en V, dentadas, variadoras y acanaladas para todo tipo de maquinaria.',
                'badge_text' => 'Amplio Stock de Productos',
                'cta_primary_text' => 'Ver Correas',
                'cta_primary_href' => '/products/correas',
                'cta_secondary_text' => 'Solicitar Cotización',
                'cta_secondary_href' => '/contact',
            ],
            [
                'imagen' => 'hero/Cinta transportadora cargada.png',
                'titulo' => 'Sistemas Hidráulicos y Neumáticos',
                'subtitulo' => 'Mangueras, conectores y componentes hidráulicos de las mejores marcas del mercado.',
                'badge_text' => 'Proveedores de Sistemas Hidráulicos y Neumáticos',
                'cta_primary_text' => 'Ver Mangueras',
                'cta_primary_href' => '/products/mangueras',
                'cta_secondary_text' => 'Contactar Ahora',
                'cta_secondary_href' => '/contact',
            ],
            [
                'imagen' => 'hero/soldador.jpeg',
                'titulo' => 'Entregas Rápidas a Todo Bolivia',
                'subtitulo' => 'Entregas rápidas a todo Bolivia con el respaldo de nuestro equipo técnico especializado',
                'badge_text' => 'Cobertura Nacional',
                'cta_primary_text' => 'Contactar Ahora',
                'cta_primary_href' => '/contact',
                'cta_secondary_text' => 'Ver Sucursales',
                'cta_secondary_href' => '/branches',
            ],
        ];

        $orden = 1;
        foreach ($heroes as $hero) {
            Hero::create([
                'empresa_id'=> 1,
                ...$hero,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
