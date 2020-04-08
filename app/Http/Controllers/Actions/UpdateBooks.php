<?php


namespace App\Http\Controllers\Actions;


use App\Book;
use Illuminate\Http\Request;

class UpdateBooks
{
    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->update($request->only(['name', 'description', 'ISBN', 'price', 'published_at']));
        $book->categories()->sync($request->get('category_id'));
        $book->authors()->sync($request->get('author_id'));
        return $book;
    }
}
