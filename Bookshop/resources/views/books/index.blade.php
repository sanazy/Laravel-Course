@extends('layouts.app')
@section('content')
    <div class="container col-6">
        <table class="table">
            <tr>
                <th>
                    Book Name
                </th>
                <th>
                    Creator
                </th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td><a href={{"/books/".$book->id}}>
                        {{$book->name}}
                    </a></td>
                    <td>{{$book->user->name}}</td>
                    @can('update', $book)
                        <td>
                            <a href="{{route('books.edit' ,['id' => $book->id])}}" class="btn btn-primary">Update</a>
                        </td>
                    @else
                        <td></td>
                    @endcan
                </tr>
            @endforeach
        </table>
        <a href="{{route('books.create')}}" class="btn btn-success btn-block">Create</a>
    </div>
@endsection
