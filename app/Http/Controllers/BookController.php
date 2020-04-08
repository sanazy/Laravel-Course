<?php

namespace App\Http\Controllers;


use App\Author;
use App\Book;
use App\Category;
use App\Http\Controllers\Actions\EditBooks;
use App\Http\Controllers\Actions\IndexBooks;
use App\Http\Controllers\Actions\ShowBooks;
use App\Http\Controllers\Actions\StoreBooks;
use App\Http\Controllers\Actions\UpdateBooks;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBookCreated;
use Kavenegar\KavenegarApi;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['create','locale', 'edit']);
    }

    public function welcome() {
        return view('welcome');
    }

    public function index() {
        $books = (new IndexBooks)->index();
        return view('books.index', compact('books'));
    }

    public function show($id){
        $book = (new ShowBooks)->show($id);
        return view('books.show', compact('book'));
    }

    public function create(){
        $categories = Category::all();
        $authors = Author::all();
        return view('books.create', compact('categories', 'authors'));
    }

    public function store(UserStoreRequest $request)
    {
        $book = (new StoreBooks)->store($request);
        event(new \App\Events\BookCreated($book, Auth::user()));
        return redirect('/books');
    }

    public function locale($locale){
        App::setLocale($locale);
        return view('books.create');
    }

    public function edit($id){
        $book = Book::find($id);
        $this->authorize('update', $book);
        //abort_if(($book->user->id != Auth::user()->id), Response::HTTP_UNAUTHORIZED);
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('book' ,'categories', 'authors'));
    }

    public function update(Request $request, $id){
        $book = (new UpdateBooks)->update($request, $id);
        return redirect('/books');
    }
}
