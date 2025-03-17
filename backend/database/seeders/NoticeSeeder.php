<?php

namespace Database\Seeders;

use App\Models\Notices;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $noticias = [
        [
            'title' => 'Innovaciones en Inteligencia Artificial',
            'paragraph' => 'Las últimas tendencias en IA están revolucionando la industria tecnológica con avances sorprendentes.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\ia.jpeg',
            'url' => 'https://www.tecnologia.com/',
        ],
        [
            'title' => 'El Auge del Turismo Espacial',
            'paragraph' => 'Empresas privadas están acercando la posibilidad de viajar al espacio más que nunca.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\espacio.jpeg',
            'url' => 'https://www.espacioturismo.com/',
        ],
        [
            'title' => 'Descubrimientos en el Océano',
            'paragraph' => 'Científicos han encontrado nuevas especies en lo más profundo del océano.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\oceanos.jpeg',
            'url' => 'https://www.naturalezaviva.com/',
        ],
        [
            'title' => 'Avances en Energías Renovables',
            'paragraph' => 'Las nuevas tecnologías solares y eólicas están cambiando el panorama energético global.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\energias.jpeg',
            'url' => 'https://www.energiasverdes.com/',
        ],
        [
            'title' => 'El Futuro de los Videojuegos',
            'paragraph' => 'Los gráficos hiperrealistas y la realidad virtual están transformando la industria gaming.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\videojuegos.jpeg',
            'url' => 'https://www.gamingnews.com/',
        ],
        [
            'title' => 'Descubriendo Civilizaciones Perdidas',
            'paragraph' => 'Arqueólogos han hallado restos de una civilización desconocida en América del Sur.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\arqueologia.jpeg',
            'url' => 'https://www.historiamisteriosa.com/',
        ],
        [
            'title' => 'Alimentación del Futuro',
            'paragraph' => 'Los alimentos sintéticos y la agricultura vertical podrían alimentar a la humanidad en el futuro.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\alimentacion.jpeg',
            'url' => 'https://www.foodtech.com/',
        ],
        [
            'title' => 'Avances en la Medicina Moderna',
            'paragraph' => 'Nuevos tratamientos están logrando curas para enfermedades antes consideradas incurables.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\medicina.jpeg',
            'url' => 'https://www.saludavances.com/',
        ],
        [
            'title' => 'Impacto del Cambio Climático',
            'paragraph' => 'Los expertos alertan sobre los efectos del calentamiento global en la biodiversidad.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\cambioclimatico.jpeg',
            'url' => 'https://www.medioambiente.com/',
        ],
        [
            'title' => 'Tendencias en Educación Digital',
            'paragraph' => 'Las plataformas de aprendizaje online están cambiando la forma en que adquirimos conocimientos.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\educacion.jpeg',
            'url' => 'https://www.educacionfuturo.com/',
        ],
    ];

    foreach ($noticias as $noticia) {
        Notices::create([
            'title' => $noticia['title'],
            'paragraph' => $noticia['paragraph'],
            'img' => $noticia['img'],
            'url' => $noticia['url'],
            'fechaPublicacion' => Carbon::now()->format('Y-m-d'),
            'horaPublicacion' => Carbon::now()->format('H:i:s'),
        ]);
    }

    }
}
