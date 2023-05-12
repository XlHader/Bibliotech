<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'El señor de los anillos',
                "author" => "J.R.R. Tolkien",
                "number_pages" => 1000,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn_code" => "321312",
                "category_id" => 1,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'El hobbit',
                "author" => "J.R.R. Tolkien",
                "number_pages" => 500,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn_code" => "121212",
                "category_id" => 1,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Frankenstein",
                "autor" => "Mary Shelley",
                "number_pages" => 280,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "4213123",
                "category_id" => 2,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Drácula",
                "autor" => "Bram Stoker",
                "number_pages" => 418,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "6534123",
                "category_id" => 2,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y la piedra filosofal",
                "autor" => "J.K. Rowling",
                "number_pages" => 223,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "52132143",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y la cámara secreta",
                "autor" => "J.K. Rowling",
                "number_pages" => 251,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "1241231254",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y el prisionero de Azkaban",
                "autor" => "J.K. Rowling",
                "number_pages" => 317,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "64543545",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y el cáliz de fuego",
                "autor" => "J.K. Rowling",
                "number_pages" => 636,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "7665643553",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y la orden del Fénix",
                "autor" => "J.K. Rowling",
                "number_pages" => 766,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "976875645",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y el misterio del príncipe",
                "autor" => "J.K. Rowling",
                "number_pages" => 607,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "4357874356",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Harry Potter y las reliquias de la muerte",
                "autor" => "J.K. Rowling",
                "number_pages" => 607,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "876753653",
                "category_id" => 3,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "La isla del tesoro",
                "autor" => "Robert Louis Stevenson",
                "number_pages" => 336,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "2468013579",
                "category_id" => 4,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "La vuelta al mundo en 80 días",
                "autor" => "Julio Verne",
                "number_pages" => 288,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "4324213132",
                "category_id" => 4,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "La guerra de los mundos",
                "autor" => "H.G. Wells",
                "number_pages" => 288,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "656435543",
                "category_id" => 4,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "La máquina del tiempo",
                "autor" => "H.G. Wells",
                "number_pages" => 288,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "7676564545",
                "category_id" => 4,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Romeo y Julieta",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "312312321",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Hamlet",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "5345234234",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Otelo",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "675464354325",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "Macbeth",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "6757657345",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "El sueño de una noche de verano",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "76767456345",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "La tempestad",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "74654365467",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "title" => "El mercader de Venecia",
                "autor" => "William Shakespeare",
                "number_pages" => 176,
                "icon" => "https://img.uxwing.com/wp-content/themes/uxwing/download/editing-user-action/read-book-icon.png",
                "isbn" => "875464565463",
                "category_id" => 5,
                "is_avaible" => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}