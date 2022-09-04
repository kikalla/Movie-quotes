<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="/add-movie">add movie</a>

<br> <br>


@foreach ($movies as $movie)   

    <a href="/movies/{{$movie->id}}">
        {{$movie->title}}
    </a>
    <br>

@endforeach
    
</body>
</html>