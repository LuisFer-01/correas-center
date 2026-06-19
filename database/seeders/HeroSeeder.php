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
                'imagen' => 'storage/hero/Industria.jpg',
                'titulo' => 'Soluciones Industriales Confiables',
                'subtitulo' => 'Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.',
                'badge_text' => 'Lider en Soluciones Industriales',
                'cta_primary_text' => 'Solicitar Asesoría',
                'cta_primary_href' => '/contact',
                'cta_secondary_text' => 'Ver Productos',
                'cta_secondary_href' => '/products',
            ],
            [
                'imagen' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwzfHxpbmR1c3RyaWFsJTIwcGFydHN8ZW58MXx8fHwxNzgwMjg1MDE3fDA&ixlib=rb-4.1.0&q=80&w=1080',
                'titulo' => 'Calidad SKF Garantizada',
                'subtitulo' => 'Fabricación autorizada SKF con los más altos estándares de calidad.',
                'badge_text' => 'Fabricante Autorizado',
                'cta_primary_text' => 'Conocer Más',
                'cta_primary_href' => '/services/fabricacion-de-sellos-skf',
                'cta_secondary_text' => 'Ver Productos',
                'cta_secondary_href' => '/products',
            ],
            [
                'imagen' => 'storage/hero/Cinta transportadora Fabrica.jpeg',
                'titulo' => 'Bandas Transportadoras, Correas y Transmisiones de Alta Resistencia',
                'subtitulo' => 'Amplio stock en bandas transportadoras, correas en V, dentadas, variadoras y acanaladas para todo tipo de maquinaria.',
                'badge_text' => 'Amplio Stock de Productos',
                'cta_primary_text' => 'Ver Correas',
                'cta_primary_href' => '/products/correas',
                'cta_secondary_text' => 'Solicitar Cotización',
                'cta_secondary_href' => '/contact',
            ],
            [
                'imagen' => 'storage/hero/Cinta transportadora cargada.png',
                'titulo' => 'Sistemas Hidráulicos y Neumáticos',
                'subtitulo' => 'Mangueras, conectores y componentes hidráulicos de las mejores marcas del mercado.',
                'badge_text' => 'Proveedores de Sistemas Hidráulicos y Neumáticos',
                'cta_primary_text' => 'Ver Mangueras',
                'cta_primary_href' => '/products/mangueras',
                'cta_secondary_text' => 'Contactar Ahora',
                'cta_secondary_href' => '/contact',
            ],
            [
                'imagen' => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHw2fHxpbmR1c3RyaWFsJTIwd2FyZWhvdXNlfGVufDF8fHx8MTc4MDI4NTAxN3ww&ixlib=rb-4.1.0&q=80&w=1080',
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
                ...$hero,
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
