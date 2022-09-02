<!DOCTYPE html>
<!-- @vite('resources/css/app.css') -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies and Quotes</title>
</head>
<body >
    <p class="text-xl text-cyan-300">sadasdasdasdasdasdasda</p>


    <form method="POST" action="">
        @csrf
        <div>
            <label for="title">Movie Title</label>
            <input type="text" name="title" id="title">
        </div>
        <button type="submit">Create Movie</button>
    </form>
</body>
</html>