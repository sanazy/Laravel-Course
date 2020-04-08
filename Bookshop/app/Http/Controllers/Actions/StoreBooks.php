<?php


namespace App\Http\Controllers\Actions;


use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreBooks
{
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $book = Auth::user()->books()->create($validated);
        $book->categories()->attach($request->get('category_id'));
        $book->authors()->attach($request->get('author_id'));

        return $book;
    }
}
