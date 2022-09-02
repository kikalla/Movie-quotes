<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>{{$movie->title}}</div>
    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Quote</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="photo">Add Photo</label>
            <input id="photo" name="photo" type="file">
        </div>

        <button type="submit">Create Quote</button>
    </form>
    <br>


    @foreach ($movie->quotes as $quote)   

    <div>{{$quote->title}}</div>
    <img src="/storage/{{$quote->photo}}" alt="photo">
    <br>

    @endforeach
   
</body>
</html>