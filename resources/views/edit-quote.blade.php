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
        
        <form class="bg-white rounded-lg w-[70%] mb-[20px] mt-[15px] flex flex-col" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="border-b-4 rounded-t-lg p-4">
                <label class="2xl:text-3xl" for="title">Quote</label>
                <input value="{{old('title', $quote->title)}}" placeholder="Update Quote" class="2xl:text-3xl border-blue-700 border-b-[2px] focus:outline-none w-[80%] ml-[5%]" type="text" name="title" id="title">
            </div>
            @error('title')
            <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
            @enderror
            <div class="border-b-4 flex p-4">
                <label class="2xl:text-3xl w-[40%]" for="photo">Update Photo</label>
                <input class="2xl:text-3xl" id="photo" name="photo" type="file">
            </div>
            @error('photo')
            <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
            @enderror
            <button class="2xl:text-3xl p-4 hover:bg-gray-500 hover:rounded-b-lg hover:text-white" type="submit">Update Quote</button>
        </form>

    </div>
    
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
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[1%]" href="{{route('movie-show', $movie)}}">Back</a>
    </div>

</body>
</html>