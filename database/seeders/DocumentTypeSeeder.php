<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('document_types')->insert([
            [
                'name' => 'Cédula de Ciudadanía',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tarjeta de Identidad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cédula de Extranjería',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}