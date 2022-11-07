<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_while_adding_book_fields_are_required()
    {
        $this->withExceptionHandling();

        $this->postJson('api/v1/books')
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name','isbn','authors','number_of_pages','publisher','country','release_date']);
    }
}
