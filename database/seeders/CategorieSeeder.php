<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Ciencía Ficción',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3500/3500421.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Terror',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/2589/2589413.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fantasía',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3500/3500673.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aventura',
                'icon' => 'https://cdn4.iconfinder.com/data/icons/book-genres/340/torch_adventure_book_journey_story_action-512.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Romance',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/5318/5318871.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}