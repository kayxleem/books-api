<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookExternalResource;
use App\Models\Book;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7;

class ExternalBookController extends Controller
{
    public function __invoke(Request $request)
    {
        $client = new Client();
        if (isset($request->name)) {
            $url = "https://www.anapioficeandfire.com/api/books?name=" . $request->name;
        } else {
            $url = "https://www.anapioficeandfire.com/api/books";
        }
        try {
            $reponse = $client->request('GET', $url, [
                'verify' => false,
            ]);
            $reponseBody = json_decode($reponse->getBody());
            if (isset($reponseBody[0])) {
                return $this->successResponse(BookExternalResource::collection($reponseBody));
            } else {
                return $this->successNotFound();
            }

            return $reponseBody[0];
        } catch (ConnectException $e) {
            return $this->successNotFound();
        }
    }
}
