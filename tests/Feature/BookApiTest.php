<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->book = $this->createBook([
            "name" => "My First Book",
            "isbn" => "123-3213243567"
        ]);
    }

    public function test_fetch_all_books()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson('api/v1/books');
        $response
            ->assertStatus(200);

        $this->assertEquals(1, count($response->json('data')));
        $responseJson=$response->json('data');
        $this->assertEquals('My First Book', $responseJson[0]['name']);
    }


    public function test_add_books()
    {
        $this->withoutExceptionHandling();
        $book = Book::factory()->make();
        $response = $this->postJson('api/v1/books',[
            'name'=>$book->name,
            'isbn' => $book->isbn,
            'authors' => $book->authors,
            'number_of_pages' => $book->number_of_pages,
            'publisher' => $book->publisher,
            'country' => $book->country,
            'release_date' => $book->release_date
        ]);
        $responseJson=$response->json('data');
        $this->assertEquals($book->name,$responseJson['name']);
        $this->assertDatabaseHas('books',['name'=> 'My First Book']);
    }

    public function test_get_single_book()
    {
        $response = $this->getJson('api/v1/books/'.$this->book->id);
        $response
            ->assertStatus(200);
        $responsejson = $response->json('data');
        $this->assertEquals("My First Book", $responsejson['name']);
    }

    public function test_update_single_book()
    {
        $this->withoutExceptionHandling();
        $response = $this->patchJson('api/v1/books/'.$this->book->id, ['name' => 'updated name'])
            ->assertOk();
        $response
            ->assertStatus(200);
    }

    public function test_delete_book()
    {
        $this->withoutExceptionHandling();
        $this->deleteJson('api/v1/books/'. $this->book->id);

        $this->assertDatabaseMissing('books', ['id' => $this->book->id]);
    }

    public function test_alternate_delete_book()
    {
        $book=Book::factory()->create();
        $this->withoutExceptionHandling();
        $this->deleteJson('api/v1/books/'. $book->id.'/delete');

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function createBook($args = [])
    {
        return Book::factory()->create($args);
    }
}
