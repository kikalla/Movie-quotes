<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST" action="">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="text" name="email">
    </div>
    @error('email')
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror

    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    @error('password')
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror

    <button type="submit">Login</button>
</form>
    
</body>
</html>