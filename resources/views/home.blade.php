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
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white" href="{{route('movies-show')}}">{{__('translation.movies')}}</a>
        
        @guest
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white" href="{{route('login-show')}}">{{__('translation.login')}}</a>
        @endguest

        @auth
        <div class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white">
            <form method="POST" action="{{route('logout')}}">
            @csrf
            <button type="submit">{{__('translation.logout')}}</button>
            </form>
        </div>
        @endauth
    </div>
</header>

@if ($quote != null)
<div class="m-auto 2xl:mt-14 mt-6 w-[50%] flex flex-col text-center">
    <img class="m-auto w-[80%] 2xl:text-5xl text-3xl" src="/storage/{{$quotePhoto}}" alt="No Photo Yet">
    <p class="2xl:mt-14 mt-6 mb-14 2xl:text-5xl text-3xl text-white">"{{$quote->title}}"</p>
    <h1 class="2xl:text-5xl text-3xl text-white">{{$movie->title}}</h1>
</div>
@else
<h1 class="m-auto 2xl:text-5xl text-3xl" t>{{__('translation.no_quote_yet')}}</h1>
@endif

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