<?php


namespace App\Http\Controllers\Actions;


use App\Book;

class ShowBooks
{
    public function show($id) {
        return Book::findOrFail($id);
    }
}
