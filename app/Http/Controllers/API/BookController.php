<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $book = Book::all();
        if($book->count() > 0)
        {
            return $this->successResponse(BookResource::collection($book));
        }else{
            return $this->successResponse();
        }
        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book= Book::create($request->all());
        return $this->successResponse(new BookResource($book),'',Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $this->successResponse(new BookResource($book));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        //return new BookResource($book);
        return $this->successResponseWithMessage(new BookResource($book), 'The book '.$book->name. 'was updated successfully');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $name=$book->name;
        $book->delete();
        return $this->successResponseWithMessage('', 'The book '.$name. 'was deleted successfully',204);
        //return response('', Response::HTTP_NO_CONTENT);
    }
}
