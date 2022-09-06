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
                <label class="2xl:text-3xl" for="title">Quote</label>
                <input placeholder="Type Quote" class="2xl:text-3xl border-blue-700 border-b-[2px] focus:outline-none w-[80%] ml-[5%]" type="text" name="title" id="title">
            </div>
            <div class="border-b-4 flex p-4">
                <label class="2xl:text-3xl w-[40%]" for="photo">Add Photo</label>
                <input class="2xl:text-3xl" id="photo" name="photo" type="file">
            </div>

            <button class="2xl:text-3xl p-4 hover:bg-gray-500 hover:rounded-b-lg hover:text-white" type="submit">Create Quote</button>
        </form>
        @endauth
    </div>

    @foreach ($movie->quotes as $quote) 
    <div class="text-center">
        <div class="w-[50%] items-center m-auto flex flex-col">
            <img class="w-[70%] 2xl:max-h-[400px] lg:max-h-[300px] object-cover rounded-t-lg border-black border-solid border-2" src="/storage/{{$quote->photo}}" alt="photo">
            <h1 class="mb-[20px] w-[70%] 2xl:text-3xl rounded-b-lg  text-center bg-white border-black border-solid border-2 relative bottom-1 break-words">"{{$quote->title}}"</h1>
        </div>
        <form method="POST" action="{{$movie->id}}/delete/{{$quote->id}}">
            @csrf
            @method('DELETE')
            <button class="bg-white mb-8">Delete</button>
        </form>
    </div>
    

    @endforeach

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
        <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[1%]" href="{{route('movies-show')}}">Back</a>
    </div>

</body>
</html>