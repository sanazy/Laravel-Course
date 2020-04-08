<?php


namespace App\Http\Controllers\Actions;


use App\Book;

class IndexBooks
{
    public function index() {
        return Book::with('user')->get();
    }
}
