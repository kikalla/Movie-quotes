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
<body class="bg-cyan-300 flex justify-center" style="background: rgb(78, 78, 78)">

<form method="POST" action="" class="bg-white rounded-lg w-[35%] mb-[20px] mt-[5%] flex flex-col">
    @csrf
    <div class="flex">
        <label class="2xl:text-3xl text-xl text-center p-4" for="email">Email</label>
        <input placeholder="Enter email" class="w-[70%] 2xl:text-3xl text-xl border-blue-700 border-b-[2px] focus:outline-none ml-[8%]" type="text" name="email">
    </div>
    @error('email')
    <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
    @enderror

    <div class="flex">
        <label class="2xl:text-3xl text-xl text-center p-4" for="password">Password</label>
        <input placeholder="Enter password" class="w-[70%] 2xl:text-3xl text-xl border-blue-700 border-b-[2px] focus:outline-none" type="password" name="password">
    </div>
    @error('password')
    <p class="text-red-500 mt-2 2xl:text-3xl text-xl text-center">{{ $message }}</p>
    @enderror

    <button class="2xl:text-3xl mt-1 p-4 hover:bg-gray-500 hover:rounded-b-lg w-[100%]" type="submit">Login</button>
</form>

<div>
    <a class="2xl:text-3xl text-xl mr-14 2xl:p-4 p-2 rounded-lg bg-cyan-50 hover:bg-red-400 hover:text-white absolute top-[5%] right-[1%]" href="/">Back</a>
</div>
    
</body>
</html>