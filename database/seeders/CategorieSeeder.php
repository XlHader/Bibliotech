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
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3502/3502688.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Terror',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3502/3502688.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fantasía',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3502/3502688.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aventura',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3502/3502688.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Romance',
                'icon' => 'https://cdn-icons-png.flaticon.com/512/3502/3502688.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}