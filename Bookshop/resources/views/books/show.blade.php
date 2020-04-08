@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-5">
            {{$book->name}}
        </h1>
        <p>
            Pages: {{$book->pages}}
        </p>
        <p>
            ISBN: {{$book->ISBN}}
        </p>
        <p>
            Price: {{$book->price}}$
        </p>
        <p>
            Published at: {{$book->published_at}}
        </p>
        <p>
            Creator: {{$book->user->name}}
        </p>

        <p>
            Categories:
                @foreach($book->categories as $category)
                    <em>
                        {{$category->name . ', '}}
                    </em>
                @endforeach
        </p>

        <p>
            Authors:
            @foreach($book->authors as $author)
                <em>
                    {{$author->name . ' ' . $author->birth_date}}
                    {{', '}}
                </em>
            @endforeach
        </p>
    </div>
@endsection
