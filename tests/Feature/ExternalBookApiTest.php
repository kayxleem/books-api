<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Mockery;
use Mockery\MockInterface;

use Tests\TestCase;

class ExternalBookApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_external_api()
    {
        $this->withoutExceptionHandling();

        $mock = $this->mock(Client::class, function (MockInterface $mock) {
            $mock->shouldReceive('name')->andReturn('A Game of Thrones');

        });

        $mock = new MockHandler([
            new Response(200, ['Name' => 'A Game of Thrones']),
        ]);
        
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        
        $response = $client->getJson('api/external-books?name=A Game of Thrones');
        $this->assertEquals(200,$response->getStatusCode());
    }
}
