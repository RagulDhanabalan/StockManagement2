@extends('Stock_Management.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel = "icon" href = "https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais" type = "image/x-icon">
</head>

<body>
    <section class="p-3 m-2 bg-gray-100 rounded">
        <h3 class="text-center">All Entries <h2 class="text-green-700 text-2xl text-center p-1 rounded"> {{ $products->name ?? 'None' }} </h2></h3>
    {{-- <div class="flex justify-center bg-gray-300 p-2 w-1/5 rounded">
        <form action="/week-entries" method="post">
            @csrf
            <p class="font-bold text-green-600">Get Entries</p>
            <label for="">From :</label><br>
            <input type="date" name="sdate"><br>
            <label for="">To :</label><br>
            <input type="date" name="edate"><br>
            <button type="submit" class="text-bold bg-black text-white px-3 py-1 mt-2 rounded">Enter</button>
        </form>
    </div> --}}

    <div class="bg-red-400 p-2 w-1/5 mt-2 rounded">
        <p class="text-white">Quantity - Total In : {{ $products->sumOfIn() }}</p>
        <p class="text-white">Quantity - Total Out : {{ $products->sumOfOut() }}</p>
    </div>
        <button class="flex mt-3">
            <a href="/products" title="Add New Product"
                class="mr-1 bg-green-600 flex hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg></a>

            <a href="/index" title="Home"
                class="bg-green-600 flex hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>

                Home</a>
        </button>

        <table class="border my-2 p-2 w-full border-black">
            @if($products->entries->isEmpty())
                <p class="text-sm text-red-500 text-center">No Records Found</p>
            @endif
            <thead class="px-2 mx-2 py-2 my-2 bg-black text-white border text-sm border-black">
                <tr class="px-2 mx-2 py-2 my-2 border border-black">
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Entry Id</th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Quantity</th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Status</th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Value<small> ( &#8377 )</small></th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Type</th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">SKU <small>( Stock Keeping Unit )</small>
                    </th>
                    <th class="px-2 mx-2 py-2 my-2 border border-black">Date</th>
                </tr>
            </thead>
            <tbody class="px-2 mx-2 py-2 my-2 border text-sm border-black">
                @foreach ( $products->entries as $product )
                    <tr class="px-2 mx-2 py-2 my-2">
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ $product->id ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ $product->quantity ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ $products->status ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ $product->value ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ $product->type ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ $products->s_k_u ?? 'None' }}</td>
                        <td class="px-2 mx-2 py-2 my-2 border text-sm text-center border-black">{{ date('d-m-Y', strtotime($product->date)) ?? 'None' }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
{{-- {{ $products->entries->links() }} --}}
    </section>
</body>
@endsection
</html>
