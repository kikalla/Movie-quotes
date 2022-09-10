<!DOCTYPE html>
@vite('resources/css/app.css')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies and Quotes</title>
    <link href="http://fonts.cdnfonts.com/css/sansation" rel="stylesheet">
</head>
<body style="background: rgb(78, 78, 78)">
    
    <form class="m-auto mt-20 w-[22%] bg-white rounded-lg flex flex-col items-center" method="POST" action="{{route('movie-create')}}">
        @csrf
        <div class="flex flex-col items-center">
            <label class="2xl:text-3xl text-xl text-center p-4 " for="title_en">{{__('translation.movie_title')}}</label>
            <input placeholder="Movie Name" class="2xl:text-3xl border-blue-700 border-b-[2px] focus:outline-none w-[80%] ml-[5%]" type="text" name="title_en" id="title_en">
        </div>
        @error('title_en')
        <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
        @enderror

        <div class="flex flex-col items-center">
            <label class="2xl:text-3xl text-xl text-center p-4 " for="title_ka">{{__('translation.movie_title')}}</label>
            <input placeholder="Movie Name(ka)" class="2xl:text-3xl border-blue-700 border-b-[2px] focus:outline-none w-[80%] ml-[5%]" type="text" name="title_ka" id="title_ka">
        </div>
        @error('title_ka')
        <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
        @enderror

        <button class="2xl:text-3xl mt-1 p-4 hover:bg-gray-500 hover:rounded-b-lg w-[100%]" type="submit">{{__('translation.create_movie')}}</button>
    </form>

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
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[1%]" href="{{route('movies-show')}}">{{__('translation.back')}}</a>
    </div>
</body>
</html>