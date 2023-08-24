@extends('Stock_Management.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
<div class="flex h-screen">
        <div class="lg:w-10/12 p-2">
                <p><span class="text-gray-500 mt-12 p-3">/ Dashboard</span></p>
                <h3 class="p-1 flex justify-between p-3">Welcome, <p class="flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                   Ragul D</p></h3>
                <hr>
                  <div class="flex">
                    <div class="w-1/3 h p-1 m-2 h-40 bg-green-600 rounded">
                        <h1 class="text-2xl text-center text-white">Products</h1><br>
                        <p class="text-3xl text-center text-red-700">{{ $product->count() }}</p>
                        <p class="text-center"><a href="{{ url('/products/') }}" class="text-center text-white">View</a></p>
                    </div>
                    <div class="card w-1/3 p-1 m-2 h-40 bg-purple-400 rounded">
                        <h1 class="text-2xl text-center text-white">Total Stocks</h1><br>
                        <p class="text-3xl text-center text-red-700">{{ $product->sum('stock') }}</p>
                        <p class="text-center"><a href="{{ url('/products/') }}" class="text-center text-white">View</a></p>
                    </div>
                    </div>
        </div>
    </div>
</body>
@endsection
</html>
