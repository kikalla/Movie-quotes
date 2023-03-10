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
            <a class="bg-cyan-50 2xl:p-8 p-4 rounded-3xl mt-20 2xl:text-5xl text-2xl hover:bg-red-400 hover:text-white" href="{{route('movie-create-show')}}">{{__('translation.add_movie')}}</a>
        </div>
        @endauth
        <div class="flex flex-col 2xl:text-5xl text-xl m-auto my-20 items-center">

            @foreach ($movies as $movie)   
            <div class="flex items-center">
                <a class="2xl:my-6 my-3  bg-slate-400 2xl:p-8 p-4 rounded-3xl hover:scale-90" href="{{route('movie-show', $movie)}}">
                    {{$movie->title}}
                </a>
                @auth
                <form class="mx-[4%]" method="POST" action="{{route('destroy-movie', $movie)}}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 rounded-3xl p-1 hover:scale-90 2xl:text-4xl text-lg">{{__('translation.delete')}}</button>
                </form>
                <a class="bg-green-500 rounded-3xl p-1 hover:scale-90 2xl:text-4xl text-lg" href="{{route('edit-movie', $movie)}}">{{__('translation.edit')}}</a>
                @endauth
            </div>
            @endforeach

        </div>
    </section>

    @auth
        <div class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[8%]">
            <form method="POST" action="{{route('logout')}}">
            @csrf
            <button type="submit">{{__('translation.logout')}}</button>
            </form>
        </div>
    @endauth

    @guest
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[8%]" href="{{route('login-show')}}">{{__('translation.login')}}</a>
    @endguest

    <div>
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[1%]" href="/">{{__('translation.back')}}</a>
    </div>
    @if (App::currentLocale() == 'en')
    <a class="bg-red-500 inline-block 2xl:w-14 2xl:h-14 2xl:text-3xl absolute left-[1%] top-[47%] text-center border border-black pt-1 w-8 h-8 rounded-full" href="{{route('locale-change', 'ka')}}">ka</a>
    @else
    <a class="bg-green-500 inline-block 2xl:w-14 2xl:h-14 2xl:text-3xl absolute left-[1%] top-[47%] text-center border border-black pt-1 w-8 h-8 rounded-full" href="{{route('locale-change', 'ka')}}">ka</a>
    @endif

    @if (App::currentLocale() == 'ka')
    <a class="bg-red-500 inline-block 2xl:w-14 2xl:h-14 2xl:text-3xl absolute left-[1%] top-[53%] text-center border border-black pt-1 w-8 h-8 rounded-full" href="{{route('locale-change', 'en')}}">en</a>
    @else
    <a class="bg-green-500 inline-block 2xl:w-14 2xl:h-14 2xl:text-3xl absolute left-[1%] top-[53%] text-center border border-black pt-1 w-8 h-8 rounded-full" href="{{route('locale-change', 'en')}}">en</a>
    @endif
</body>
</html>