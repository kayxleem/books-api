<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->create([
            'name' => 'A Game of Thrones',
            'isbn' => '978-0553103540',
            'authors' => ['George R. R. Martin'],
            'number_of_pages' => 694,
            'publisher' => 'Bantam Books',
            'country' => 'United States',
            'release_date' => '1996-08-01'
        ]);

        Book::factory()->create([
            'name' => 'A Clash of Kings',
            'isbn' => '978-0553103541',
            'authors' => ['George R. R. Martin'],
            'number_of_pages' => 694,
            'publisher' => 'Bantam Books',
            'country' => 'United States',
            'release_date' => '1999-02-02'
        ]);
    }
}
