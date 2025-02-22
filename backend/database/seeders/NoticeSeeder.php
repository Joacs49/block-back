<?php

namespace Database\Seeders;

use App\Models\Notices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notices::create([
            'title' => 'Explorando la Naturaleza',
            'paragraph' => 'Descubre los secretos ocultos de la naturaleza en este fascinante viaje por los bosques más hermosos del mundo.',
            'img' => 'C:\laragon\www\Proyectos\Blog\img\naturaleza.jpeg',
            'url' => 'https://www.youtube.com/',
            'fechaPublicacion' => now()->format('Y-m-d'),
            'horaPublicacion' => now()->format('H:i:s')
        ]);
    }
}
