@extends('Stock_Management.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="w-full">
    <div class="grid justify-items-center mt-3 mb-3 py-3">
        @if ($errors->any())
            <ul></ul>
        @endif
        <form action="/register-insert" method="post">
            @csrf
            <h3 class="text-green-500 font-bold text-center mb-6 py-6">Register Form</h3>
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name"
                class="w-full border hover:border-green-400 focus:border-green-500 outline-none border-gray-300 p-2 rounded" />
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
                <label for="name" class="block text-gray-700 font-bold mb-2">e-mail</label>
            <input type="email" name="email" id="email"
                class="w-full border hover:border-green-400 focus:border-green-500 outline-none border-gray-300 p-2 rounded" />
                @if ($errors->has('email'))
                <span class="text-red-500">{{ $errors->first('email') }}</span>
            @endif
                <div class="mt-6 text-center">
                    <button type="submit"
                        class="show-modal bg-green-500 hover:bg-green-400 text-white text-sm py-1 px-3 border-green-700 hover:border-green-500 rounded">
                        Submit</button>
                    <a href="/products"
                        class="bg-blue-500 hover:bg-blue-400 text-white text-sm py-1 px-3 border-blue-700 hover:border-blue-500 rounded">
                        Back</a>
                    <a href="/index"
                        class="bg-blue-500 hover:bg-blue-400 text-white text-sm py-1 px-3 border-blue-700 hover:border-blue-500 rounded">
                        Home</a>
                </div>
        </form>
    </div>
</body>
@endsection
</html>
