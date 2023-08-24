@extends('Stock_Management.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="icon"
            href="https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais"
            type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
            referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
            referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
        <link rel="icon"
            href="https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais"
            type="image/x-icon">
    </head>

    <body>
        <div class="w-full mt-1 pt-2 grid px-4  justify-items-center">
            {{-- session message start --}}
            @if (Session::has('message'))
                <div class="container mx-auto mt-10 space-y-5">
                    <!-- Alert Success ( for create )  -->
                    <div class="flex justify-between bg-green-500 shadow-inner rounded p-3">
                        <p class="self-center text-white">
                            {{ Session::get('message') }}
                        </p>
                        <strong class="text-xl align-center text-white cursor-pointer alert-del">&times;</strong>
                    </div>
                    <script>
                        var alert_del = document.querySelectorAll('.alert-del');

                        alert_del.forEach((x) =>
                            x.addEventListener('click', setTimeout(function() {
                                x.parentElement.classList.add('hidden');
                                location.reload();
                            }, 3000))
                        );
                    </script>
                </div>
            @endif
            @if (Session::has('update'))
                <div class="container mx-auto mt-2">
                    <!-- Alert Success ( for update )  -->
                    <div class="flex justify-between bg-green-500 shadow-inner rounded p-3">
                        <p class="self-center text-white">
                            {{ Session::get('update') }}
                        </p>
                        <strong class="text-xl align-center text-white cursor-pointer alert-del">&times;</strong>
                    </div>
                    <script>
                        var alert_del = document.querySelectorAll('.alert-del');
                        alert_del.forEach((x) =>
                            x.addEventListener('click', setTimeout(function() {
                                x.parentElement.classList.add('hidden');
                                location.reload();
                            }, 3000))
                        );
                    </script>
                </div>
            @endif

            {{-- session message end --}}

            <div class="lg:w-10/12 p-2 mt-12">
                <p><span class="text-gray-500 mt-12 p-3">/ Dashboard</span></p>
                <h3 class="p-1 flex justify-between p-3">Welcome, <p class="flex"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Ragul D</p>
                </h3>
                <hr>
                <div class="flex justify-between">
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
            {{-- --------------------------------------- --}}
            <h2 class="mb-6 w-full uppercase text-black p-1 font-bold text-center rounded">Products</h2>

            {{-- -------------------form --}}
            <div class="grid justify-items-center bg-gray-300 w-1/3 mt-2 p-1 mx-auto">
                <form method="POST" action="/in-out" class="mx-auto">
                    @csrf
                    <select name="id" id="id" class="w-full mx-auto mb-1 bg-white" required>
                        <option class="text-center" selected disabled>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} </option>
                        @endforeach
                    </select><br>
                    <label for="">From</label>
                    <input type="date" name="sdate">
                    <label for="">To</label>
                    <input type="date" name="edate">
                    <button
                        class="bg-black text-white justify-items-center text-center mx-auto p-1 rounded mt-2 hover:text-gray-400">Submit</button>
                </form>
                {{-- <form action="/products" method="GET" class="w-full flex">
                        @csrf
                        <input type="text" name="search" value="{{ $searchTerm }}" class="ml-14 w-60 h-8 mr-2 px-1 rounded" placeholder="Search here..."
                            required>
                        <button type="submit" class="px-2 bg-blue-500 text-white rounded">Search</button>
                    </form> --}}

            </div>

            {{-- ---------------------------form --}}
            <table class="border  w-full my-2 mx-auto table-auto border-black shadow-lg rounded">

                @if ($products->isEmpty())
                    <p class="text-sm text-red-500">No Record Found</p>
                @endif
                <thead class="p-2 m-2 border bg-black text-white border-black">
                    <tr class="p-2 m-2 border uppercase border-black">
                        {{-- <th class="sort p-2 m-2 border border-black cursor-pointer" data-column="product_id" data-order="desc">S.No</th> --}}
                        <th class="sort p-2 m-2 border border-black cursor-pointer" data-column="product_id"
                            data-order="desc">Product Id</th>
                        <th class="sort flex space-x-1 p-2 m-2 border border-black" data-column="name" data-order="desc">
                            Name
                        </th>
                        <th class="p-2 m-2 border border-black">Stock</th>
                        <th class="p-2 m-2 border border-black">Status</th>
                        <th class="sort flex justify-between p-2 m-2 border border-black" data-column="price"
                            data-order="desc">Price<small>( &#8377 )</small></th>
                        <th class="p-2 m-2 border border-black">SKU <small class="font-thin">( Stock Keeping Unit)</small>
                        </th>
                        <th class="p-2 m-2 border border-black">Action</th>
                        <th class="p-2 m-2 border border-black">In</th>
                        <th class="p-2 m-2 border border-black">Out</th>
                    </tr>
                </thead>
                <tbody class="border ">
                    @foreach ($products as $product)
                        <tr @if ($loop->odd) class="bg-yellow-200" @endif>
                            {{-- <td class="m-2 p-2 text-center text-sm border">{{ $loop->iteration ?? 'None' }}</td> --}}
                            <td class="m-2 p-2 text-center text-sm border">{{ $product->id ?? 'None' }}</td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->name ?? 'None' }}</td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->stock ?? 'None' }}</td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->status ?? 'None' }}
                            </td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->price ?? 'None' }}</td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->s_k_u ?? 'None' }}</td>
                            <td class="p-2 m-2 text-sm text-center border"><a
                                    href="{{ url('/products/' . $product->id . '/view-entries') }}"
                                    class="text-black text-sm border px-1 mx-1 py-1 my-1 w-2 bg-blue-200 hover:bg-blue-500 hover:text-white rounded">Entries</a>
                                <a href="{{ url('/products/' . $product->id . '/edit') }}"
                                    class="border w-2 text-black bg-pink-300 border-pink-200 hover:bg-pink-500 hover:text-white px-1 mx-1 py-1 my-1 rounded">Edit
                                </a>
                            </td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->sumOfIn() }}</td>
                            <td class="p-2 m-2 text-center text-sm border">{{ $product->sumOfOut() }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $products->links() }}

        </div>
        {{-- entries ----------------------------------------- --}}

        <div class="p-3 mx-6">
            <div class="p-2 mx-6 mt-1 grid justify-items-center mx-auto">
                {{-- session message start --}}
                @if (Session::has('message'))
                    <div class="container mx-auto mt-10 space-y-5">
                        <!-- Alert Success  -->
                        <div class="flex justify-between bg-green-500 shadow-inner rounded p-3">
                            <p class="self-center text-white">
                                {{ Session::get('message') }}
                            </p>
                            <strong class="text-xl align-center text-white cursor-pointer alert-del">&times;</strong>
                        </div>
                        <script>
                            var alert_del = document.querySelectorAll('.alert-del');
                            alert_del.forEach((x) =>
                                x.addEventListener('click', setTimeout(function() {
                                    x.parentElement.classList.add('hidden');
                                    location.reload();
                                }, 3000))
                            );
                        </script>
                    </div>
                @endif

                {{-- session message end --}}
                <h2 class="mb-5 mt-2 p-1 font-bold text-center rounded">Entries</h2>

                <table class="border table-auto border-black shadow-lg">
                    @if ($entries->isEmpty())
                        <p class="text-sm text-red-500">No Record Found</p>
                    @endif
                    <thead class="border bg-black text-sm text-white border-black">
                        <tr>
                            <th class="p-1 m-2 text-sm border border-black">S.No</th>
                            <th class="p-2 m-2 text-sm border border-black">Product Name</th>
                            <th class="p-2 m-2 text-sm border border-black">Type <small>( In / Out )</small></th>
                            <th class="p-2 m-2 text-sm border border-black">Quantity</th>
                            <th class="p-2 m-2 text-sm border border-black">Description</th>
                            <th class="p-2 m-2 text-sm border border-black">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr>
                            @foreach ($entries as $entry)
                                <td class="p-2 m-2 border text-center text-sm">{{ $entry->id ?? 'None' }}</td>
                                <td class="p-2 m-2 border text-center text-sm">
                                    {{ $entry->product->name ?? 'None' }}</td>
                                <td class="p-2 m-2 border text-center text-sm">{{ $entry->type ?? 'None' }}
                                </td>
                                <td class="p-2 m-2 border text-center text-sm">{{ $entry->quantity ?? 'None' }}
                                </td>
                                <td class="p-2 m-2 border text-center text-sm">
                                    {{ $entry->description ?? 'None' }}</td>
                                <td class="p-2 m-2 border text-center text-sm">
                                    {{ date('d-M-Y ', strtotime($entry->date)) ?? 'None' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-2 mb-3">
                    {{ $entries->links() }}
                </div>
                <h3>Pie Chart</h3>
                <div style="width: 30%; margin: auto;" class="grid h-auto mx-auto justify-items-center align-middle">
                    {{-- <h3 class="text-green-500 font-bold">Products - Pie Chart</h3><br> --}}
                    <canvas id="pieChart"></canvas>
                </div>

                <div class="w-full h-auto">
                    <script>
                        // var ctx = document.getElementById('productChart').getContext('2d');
                        var pieCtx = document.getElementById('pieChart').getContext('2d');
                        var data = @json($data);

                        var labels = data.map(item => item.name);
                        var values = data.map(item => item.stock);

                        var productChart = new Chart(pieCtx, {
                            type: 'pie',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Product Quantity',
                                    data: values,
                                    backgroundColor: ['red', '#800080', 'yellow', '#0000FF', 'orange', 'gray', '#008080',
                                        'pink', 'lightgray', '#800000', 'green', '#FF00FF'
                                    ],
                                    borderColor: '#000000',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
                <h3>Bar Chart</h3>
                <div style="width: 40%; margin: auto;" class="grid h-auto mx-auto justify-items-center align-middle">
                    {{-- <h3 class="text-green-500 font-bold">Products - Bar Chart</h3><br> --}}
                    <canvas id="barChart">
                        {{-- <h3>Bar Chart</h3> --}}
                    </canvas>
                </div>
                <div class="w-full h-auto ">
                    <script>
                        // var ctx = document.getElementById('productChart').getContext('2d');

                        var barCtx = document.getElementById('barChart').getContext('2d');
                        var bar = @json($data);

                        var labels = data.map(item => item.name);
                        var values = data.map(item => item.stock);

                        var productChart = new Chart(barCtx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Product Quantity',
                                    data: values,
                                    backgroundColor: ['red', '#800080', 'yellow', '#0000FF', 'orange', 'gray', '#008080',
                                        'pink', 'lightgray', '#800000', 'green', '#FF00FF'
                                    ],
                                    borderColor: '#000000',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
                <h3>Products - Graph</h3>
                <div style="width: 40%; margin: auto;" class="grid h-auto mx-auto justify-items-center align-middle">
                    {{-- <h3 class="text-green-500 font-bold">Products - Bar Chart</h3><br> --}}
                    <canvas id="graph">
                        {{-- <h3>Bar Chart</h3> --}}
                    </canvas>
                </div>
                <div class="w-full h-full ">
                    <script>
                        // var ctx = document.getElementById('productChart').getContext('2d');

                        var graphCtx = document.getElementById('graph').getContext('2d');
                        var bar = @json($data);

                        var labels = data.map(item => item.name);
                        var values = data.map(item => item.stock);

                        var productChart = new Chart(graphCtx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Product Quantity',
                                    data: values,
                                    backgroundColor: ['red', '#800080', 'yellow', '#0000FF', 'orange', 'gray', '#008080',
                                        'pink', 'lightgray', '#800000', 'green', '#FF00FF'
                                    ],
                                    borderColor: '#000000',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
    </body>
@endsection

</html>
