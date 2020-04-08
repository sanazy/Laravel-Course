@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">
                    {{__('messages.form_name')}}
                </h5>
                <form method="POST" action="{{route('books.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">{{__('messages.name')}}</label>
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{old('name')}}" placeholder={{__('messages.name_ph')}}>
                    </div>
                    <div class="form-group">
                        <label for="pages">{{__('messages.pages')}}</label>
                        <input type="text" class="form-control" name="pages" id="pages"
                               value="{{old('pages')}}" placeholder={{__('messages.pages_ph')}}>
                    </div>
                    <div class="form-group">
                        <label for="ISBN">{{__('messages.isbn')}}</label>
                        <input type="text" class="form-control" name="ISBN" id="ISBN"
                               value="{{old('ISBN')}}" placeholder={{__('messages.isbn_ph')}}>
                    </div>
                    <div class="form-group">
                        <label for="price">{{__('messages.price')}}</label>
                        <input type="text" class="form-control" name="price" id="price"
                               value="{{old('price')}}" placeholder={{__('messages.price_ph')}}>
                    </div>
                    <div class="form-group">
                        <label for="published_at">{{__('messages.published_at')}}</label>
                        <input type="text" class="form-control" name="published_at" id="published_at"
                               value="{{old('published_at')}}" placeholder={{__('messages.published_at_ph')}}>
                    </div>

                    <div class="form-group">
                        <label for="category">{{__('messages.category')}}</label>
                        <select multiple name="category_id[]" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="author">{{__('messages.author')}}</label>
                        <select multiple name="author_id[]" id="author" class="form-control">
                            @foreach($authors as $author)
                                <option value="{{$author->id}}"> {{$author->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    @include('layouts.error')

                    <button type="submit" class="btn btn-success">{{__('messages.save')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
