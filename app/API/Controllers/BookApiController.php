<?php

namespace App\API\Controllers;

use App\Book;
use App\Http\Controllers\Actions\IndexBooks;
use App\Http\Controllers\Actions\ShowBooks;
use App\Http\Controllers\Actions\StoreBooks;
use App\Http\Controllers\Actions\UpdateBooks;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\Book as BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BookApiController extends Controller
{
    public function __construct(){
        $this->middleware('auth.basic')->only('store','update');
    }

    public function index() {
        return new BookCollection((new IndexBooks)->index());
    }

    public function show($id){
        return new BookResource((new ShowBooks)->show($id));
    }

    public function store(UserStoreRequest $request){

        return response()->json(['data' => (new StoreBooks)->store($request)], HttpResponse::HTTP_CREATED);
    }

    public function update(Request $request, $id){
        return (new UpdateBooks)->update($request, $id);
    }
}
