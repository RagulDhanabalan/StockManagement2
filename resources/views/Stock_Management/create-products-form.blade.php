@extends('Stock_Management.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel = "icon" href = "https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais" type = "image/x-icon">
</head>

<body class="w-full h-full bg-gray-200 my-auto">
    <div class="container w-1/2 mx-auto  p-3 h-screen  rounded">
        <form action="/insert-products" id="products-form" method="post"
            class="max-w-md mx-auto h-full bg-white p-3 rounded shadow-md">
            @csrf
            <h4 class="text-center text-green-600 font-bold">Create Product</h4>
            <div class="mb-1">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name :</label>
                <input type="text" id="name" autofocus name="name" placeholder="Enter product Name"
                    class="w-full border hover:border-green-400 focus:border-green-500 outline-none border-gray-300 p-2 rounded" value="{{ old('name') }}" />
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                    {{-- <span class="text-red-500">{{ $errors->first('name.alphanumeric') }}</span> --}}
                    <span class="text-red-500">{{ $errors->first('name.regex') }}</span>
                    <span class="text-red-500">{{ $errors->first('name.unique') }}</span>
                @endif
            </div>

            <div class="mb-1">
                <label for="stock" class="block text-gray-700 font-bold mb-2">Stock :</label>
                <input type="number" id="stock" name="stock" class="w-full border border-gray-300 hover:border-green-400 focus:border-green-500 outline-none p-2 rounded"
                    value="{{ old('stock') }}"  placeholder="0.00"/>
                @if ($errors->has('stock'))
                    <span class="text-red-500">{{ $errors->first('stock') }}</span>
                    <span class="text-red-500">{{ $errors->first('stock.integer') }}</span>
                @endif
            </div>

            <label for="status" class="block text-gray-700 font-bold mb-2">Status :</label>
            <div class="mb-1">
                <input type="radio" name="status" id="status" value="Active" />
                <label for="status">Active</label>
                <input type="radio" name="status" id="status" class="focus:bg-green-400" value="In-Active" />
                <label for="status">In-Active</label></br>
                @if ($errors->has('status'))
                    <span class="text-red-500">{{ $errors->first('stock') }}</span>
                @endif
            </div>

            <div class="mb-1">
                <label for="price" class="block text-gray-700 font-bold mb-2">Price :</label>
                <input type="number" id="price" name="price" rows="4" placeholder="Rs.000.00"
                    class="w-full border border-gray-300 hover:border-green-400 focus:border-green-500 outline-none p-2 rounded" value="{{ old('price') }}" />
                @if ($errors->has('price'))
                    <span class="text-red-500">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="mb-1">
                <label for="s_k_u" class="block text-gray-700 font-bold mb-2">SKU ( Stock Keeping Unit ) :</label>
                <select name="s_k_u" id="s_k_u"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg hover:border-green-400 focus:ring-green-500 focus:border-green-500 block w-full p-2 dark:bg-green-700 dark:border-green-600 outline-none dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Select SKU type</option>
                    <option value="kilo grams">Kilo grams</option>
                    <option value="Litres">Litres</option>
                    <option value="Bunches">Bunches</option>
                    <option value="Pieces">Pieces</option>
                    <option value="grams">Grams</option>
                    <option value="Boxes">Boxes</option>
                    <option value="No.">No.</option>
                    <option value="Packets">Packets</option>
                </select></br>
                @if ($errors->has('s_k_u'))
                    <span class="text-red-500">{{ $errors->first('s_k_u') }}</span>
                @endif
            </div>

            <div class="mt-6 text-center">
                <button type="submit"
                    class="show-modal bg-green-500 hover:bg-green-400 text-white text-sm py-1 px-3 border-green-700 hover:border-green-500 rounded">
                    Create</button>
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
