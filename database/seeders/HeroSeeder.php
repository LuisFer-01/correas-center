<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroes = [
            [
                'imagen' => '/hero/Industria.jpg',
                'titulo' => 'Soluciones Industriales Confiables',
                'subtitulo' => 'Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.',
                'badge_text' => 'Lider en Soluciones Industriales',
            ],
            [
                'imagen' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwzfHxpbmR1c3RyaWFsJTIwcGFydHN8ZW58MXx8fHwxNzgwMjg1MDE3fDA&ixlib=rb-4.1.0&q=80&w=1080',
                'titulo' => 'Calidad SKF Garantizada',
                'subtitulo' => 'Fabricación autorizada SKF con los más altos estándares de calidad.',
                'badge_text' => 'Fabricante Autorizado',
            ],
            [
                'imagen' => '/hero/Cinta transportadora Fabrica.jpeg',
                'titulo' => 'Bandas Transportadoras, Correas y Transmisiones de Alta Resistencia',
                'subtitulo' => 'Amplio stock en bandas transportadoras, correas en V, dentadas, variadoras y acanaladas para todo tipo de maquinaria.',
                'badge_text' => 'Amplio Stock de Productos',
            ],
            [
                'imagen' => '/hero/Cinta transportadora cargada.png',
                'titulo' => 'Sistemas Hidráulicos y Neumáticos',
                'subtitulo' => 'Mangueras, conectores y componentes hidráulicos de las mejores marcas del mercado.',
                'badge_text' => 'Proveedores de Sistemas Hidráulicos y Nemáticos',
            ],
            [
                'imagen' => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHw2fHxpbmR1c3RyaWFsJTIwd2FyZWhvdXNlfGVufDF8fHx8MTc4MDI4NTAxN3ww&ixlib=rb-4.1.0&q=80&w=1080',
                'titulo' => 'Entregas Rápidas a Todo Bolivia',
                'subtitulo' => 'Entregas rápidas a todo Bolivia con el respaldo de nuestro equipo técnico especializado',
                'badge_text' => 'Cobertura Nacional',
            ],
        ];

        $orden = 1;
        foreach ($heroes as $hero) {
            Hero::create([
                'imagen' => $hero['imagen'],
                'titulo' => $hero['titulo'],
                'subtitulo' => $hero['subtitulo'],
                'badge_text' => $hero['badge_text'],
                'orden' => $orden++,
                'estado' => 'activo',
            ]);
        }
    }
}
