<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'A Game of Thrones',
            'isbn' => '978-0553103540',
            'authors' => ['George R. R. Martin'],
            'number_of_pages' => 694,
            'publisher' => 'Bantam Books',
            'country' => 'United States',
            'release_date' => '1996-08-01'
        ];
    }
}
