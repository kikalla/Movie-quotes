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
<body class="bg-cyan-300 flex flex-col" style="background: rgb(78, 78, 78)">
    <section class="flex flex-col justify-center align-middle">
        @auth
        <div class="m-auto 2xl:mt-16 mt-8">
            <a class="bg-cyan-50 2xl:p-8 p-4 rounded-3xl mt-20 2xl:text-5xl text-2xl hover:bg-red-400 hover:text-white" href="{{route('movie-create-show')}}">Add Movie</a>
        </div>
        @endauth
        <div class="flex flex-col 2xl:text-5xl text-xl m-auto my-20 items-center">

            @foreach ($movies as $movie)   
            <div class="flex">
                <a class="2xl:my-6 my-3  bg-slate-400 2xl:p-8 p-4 rounded-3xl hover:scale-90" href="{{route('movie-show', $movie)}}">
                    {{$movie->title}}
                </a>
                <form method="POST" action="movies/delete/{{$movie->id}}">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach

        </div>
    </section>

    @auth
        <div class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[8%]">
            <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[8%]" href="{{route('login-show')}}">Login</a>
    @endguest

    <div>
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[1%]" href="/">Back</a>
    </div>
</body>
</html>