@extends('Stock_Management.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Entries</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel = "icon" href = "https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais" type = "image/x-icon">
</head>

<body class="bg-gray-200 w-full p-3 mx-auto my-auto h-full">
<!-- Home page content here -->
<div class="container mx-auto p-2 h-full w-1/3 mt-5 rounded shadow-lg">
    <h3 class="text-center text-green-500 font-bold">Create Entries</h3>
    <form action="/insert-entries" method="post" class="max-w-md mx-auto h-full bg-white p-3 rounded">
        @csrf
        <label for="product_id" class="block text-gray-700 font-bold mb-2">Product :</label>
        <select name="product_id" id="product_id" class="w-full border border-green-500 focus:border-green-600 outline-none border-gray-300 p-1 rounded" aria-placeholder="Select Product Name" autofocus>
            <option value="" class="text-black">Select Product Name</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('name'))
            <span class="text-red-500">{{ $errors->first('name') }}</span>
        @endif
        <label for="type" class="block text-gray-700 font-bold mb-2">Type :</label>
        <input type="radio" id="type" name="type"value="In" />
        <label for="in">In</label>
        <input type="radio" id="type" name="type" value="Out" />
        <label for="in">Out</label></br>
        @if ($errors->has('type'))
            <span class="text-red-500">{{ $errors->first('type') }}</span>
        @endif
        <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity :</label>
        <input type="number" id="quantity" name="quantity" class="w-full border border-green-500 focus:border-green-600 outline-none border-gray-300 p-1 rounded"
            placeholder="Enter Quantity" />
        @if ($errors->has('quantity'))
            <span class="text-red-500">{{ $errors->first('quantity') }}</span>
        @endif

        <label for="description" class="block text-gray-700 font-bold mb-2">Description :</label>
        <textarea name="description" id="description" name="description" cols="30"
            class="w-full border border-green-500 focus:border-green-600 outline-none border-gray-300 p-1 rounded" rows="2" placeholder="Give Entry Description"></textarea>
        @if ($errors->has('description'))
            <span class="text-red-500">{{ $errors->first('description') }}</span>
        @endif
        <label for="date" class="block text-gray-700 font-bold mb-2">Date :</label>
        <input type="date" id="date" name="date"
            class="w-full border border-green-500 focus:border-green-600 outline-none border-gray-300 p-1 mb-2 rounded" />
        @if ($errors->has('date'))
            <span class="text-red-500">{{ $errors->first('date') }}</span>
        @endif

        <div class="">
        <button type="submit"
            class="grid  w-full mb-2 bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded">Create Entry</button>
        <div class="container grid justify-items-center text-center">
            <a href="/entries" class="flex mr-1 mb-1 items-start bg-blue-600 hover:bg-blue-700 text-white text-sm rounded px-3 py-1">Back</a>
            <a href="/index" class="bg-blue-600 hover:bg-blue-700 text-white text-sm rounded px-3 py-1">Home</a>
        </div>
    </div>
    </form>
</div>


    </body>
    @endsection
</html>
