<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>Laravel 6 Import Export Excel with Heading using Laravel Excel 3.1 - MyNotePaper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="text-center" style="margin: 20px 0px 20px 0px;">
        <span class="text-secondary">Laravel 6 Import Export Excel with Heading using Laravel Excel 3.1</span>
    </div>
    <br/>

    <div class="clearfix">
        <div class="float-left">
            <form class="form-inline" action="{{url('courses/import')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imported_file"/>
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
                <button style="margin-left: 10px;" class="btn btn-info" type="submit">Import</button>
            </form>
        </div>
        <div class="float-right">
            <form action="{{url('courses/export')}}" enctype="multipart/form-data">
                <button class="btn btn-dark" type="submit">Export</button>
            </form>
        </div>
    </div>
    <br/>

    @if(count($courses))
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Duration</td>
                <td>Price</td>
                <td>Author</td>
            </tr>
            </thead>
            @foreach($courses as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    <td>{{$course->duration}}</td>
                    <td>{{$course->price}}</td>
                    <td>{{$course->author}}</td>
                </tr>
            @endforeach
        </table>
    @endif

</div>

</body>
</html>
