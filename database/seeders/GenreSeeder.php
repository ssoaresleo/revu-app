<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Ficção Científica', 'icon' => 'ficcao'],
            ['name' => 'Romance', 'icon' => 'romance'],
            ['name' => 'Fantasia', 'icon' => 'fantasia'],
            ['name' => 'Terror', 'icon' => 'terror'],
            ['name' => 'Suspense', 'icon' => 'suspense'],
            ['name' => 'Biografia', 'icon' => 'biografia'],
            ['name' => 'Drama', 'icon' => 'drama'],
            ['name' => 'Autoajuda', 'icon' => 'autoajuda'],
            ['name' => 'Mistério', 'icon' => 'misterio'],
            ['name' => 'História', 'icon' => 'book'],
            ['name' => 'Poesia', 'icon' => 'poesia'],
            ['name' => 'Aventura', 'icon' => 'aventura'],
        ];

        foreach ($genres as $genre) {
            Genre::updateOrCreate(
                ['name' => $genre['name']],
                ['icon' => $genre['icon']]
            );
        }
    }
}
