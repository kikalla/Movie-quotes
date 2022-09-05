<!DOCTYPE html>
@vite('resources/css/app.css')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.cdnfonts.com/css/sansation" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-blue-400 flex flex-col max-h-screen" style="background: rgb(78, 78, 78)">


<header class="">
    <div class="flex justify-end mt-6 2xl:px-20 2xl:py-5 py-2">
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white" href="/movies">Movies</a>
        
        @guest
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white" href="/login">Login</a>
        @endguest

        @auth
        <div class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white">
            <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
            </form>
        </div>
        @endauth
    </div>
</header>

<div class="m-auto 2xl:mt-14 mt-6 w-[50%] flex flex-col text-center">
    <img class="m-auto w-[80%] 2xl:text-5xl text-3xl" src="/storage/{{$quotePhoto}}" alt="No Photo Yet">
    <p class="2xl:mt-14 mt-6 mb-14 2xl:text-5xl text-3xl text-white">"{{$quote}}"</p>
    <h1 class="2xl:text-5xl text-3xl text-white">{{$movie->title}}</h1>
</div>

</body>
</html>                 