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
<body class="flex flex-col bg-blue-400 " style="background: rgb(78, 78, 78)">
    
    <div class="flex flex-col m-auto my-8 w-[50%] items-center ">
        <div class="2xl:text-5xl text-3xl text-center text-white" >{{$movie->title}}</div>
        @auth
        <form class="bg-white rounded-lg w-[70%] mb-[20px] mt-[15px] flex flex-col" method="POST" action="{{$movie->id}}/quotes" enctype="multipart/form-data">
            @csrf

            <div class="border-b-4 rounded-t-lg p-4">
                <label class="2xl:text-3xl" for="title_en">{{__('translation.quote')}}</label>
                <input placeholder="Type Quote" class="2xl:text-3xl border-blue-700 border-b-[2px] focus:outline-none w-[80%] ml-[5%]" type="text" name="title_en" id="title_en">
            </div>
            @error('title_en')
            <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
            @enderror

            <div class="border-b-4 rounded-t-lg p-4">
                <label class="2xl:text-3xl" for="title_ka">{{__('translation.quote')}}</label>
                <input placeholder="Type Quote" class="2xl:text-3xl border-blue-700 border-b-[2px] focus:outline-none w-[80%] ml-[5%]" type="text" name="title_ka" id="title_ka">
            </div>
            @error('title_ka')
            <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
            @enderror
            <div class="border-b-4 flex p-4">
                <label class="2xl:text-3xl w-[40%]" for="photo">{{__('translation.add_photo')}}</label>
                <input class="2xl:text-3xl" id="photo" name="photo" type="file">
            </div>
            @error('photo')
            <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
            @enderror
            <button class="2xl:text-3xl p-4 hover:bg-gray-500 hover:rounded-b-lg hover:text-white" type="submit">{{__('translation.create_quote')}}</button>
        </form>
        @endauth
    </div>

    @foreach ($movie->quotes as $quote) 
    <div class="text-center">
        <div class="w-[50%] items-center m-auto flex flex-col">
            <img class="w-[70%] 2xl:max-h-[400px] lg:max-h-[300px] object-cover rounded-t-lg border-black border-solid border-2" src="/storage/{{$quote->photo}}" alt="photo">
            <h1 class="w-[70%] 2xl:text-3xl rounded-b-lg  text-center bg-white border-black border-solid border-2 relative bottom-1 break-words">"{{$quote->title}}"</h1>
        </div>
        @auth
        <div class="flex justify-center">
            <form method="POST" action="{{route('destroy-quote', $quote)}}">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 rounded-3xl p-1 hover:scale-90 2xl:text-4xl text-2xl mr-3">{{__('translation.delete')}}</button>
            </form>
            <a class="bg-green-500 rounded-3xl p-1 hover:scale-90 mb-[20px] 2xl:text-4xl text-2xl" href="{{route('edit-quote', [$movie,$quote])}}">{{__('translation.edit')}}</a>
        </div>
        @endauth
    </div>
    

    @endforeach

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