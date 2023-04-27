<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'first_name' => 'example 1',
                'last_name' => 'example 1',
                'document_type_id' => 1,
                'document_number' => '123456789',
                'birth_date' => '1990-01-01',
                'phone_number' => '3000000000', // NULLABLE
                'direction' => 'example 1',     // NULLABLE
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'example 2',
                'last_name' => 'example 2',
                'document_type_id' => 1,
                'document_number' => '123456788',
                'birth_date' => '1990-01-01',
                'phone_number' => '3000000000', // NULLABLE
                'direction' => 'example 2',     // NULLABLE
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'example 3',
                'last_name' => 'example 3',
                'document_type_id' => 1,
                'document_number' => '123456787', 
                'birth_date' => '1990-01-01',
                'phone_number' => '3000000000', // NULLABLE
                'direction' => 'example 3',     // NULLABLE
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'example 4',
                'last_name' => 'example 4',
                'document_type_id' => 1,
                'document_number' => '123456786', 
                'birth_date' => '1990-01-01',
                'phone_number' => '3000000000', // NULLABLE
                'direction' => 'example 4',     // NULLABLE
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => 'example 5',
                'last_name' => 'example 5',
                'document_type_id' => 1,
                'document_number' => '123456785', 
                'birth_date' => '1990-01-01',
                'phone_number' => '3000000000', // NULLABLE
                'direction' => 'example 5',     // NULLABLE
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}