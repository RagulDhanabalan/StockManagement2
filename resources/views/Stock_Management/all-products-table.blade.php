<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel = "icon" href = "https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais" type = "image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
</head>

<body class="flex w-full h-full justify-between text-gray-700 rounded">
    <div class="sidebar bg-green-500 h-90 justify-items-center  mx-1 w-1/5 mt-12 pt-12 px-3">
        <div>
            <ul>
                <li class="p-3 m-1"><a href="#" class="flex outline-none text-white font-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>
                  Home</a></li>
                <li class="p-3 m-1"><a href="#" class="flex outline-none text-white font-sm">Our Vision</a></li>
                <li class="p-3 m-1"><a href="#" class="flex outline-none text-white font-sm">Projects</a></li>
                <li class="p-3 m-1"><a href="#" class="flex outline-none text-white font-sm">Exports</a></li>
                <li class="p-3 m-1"><a href="#" class="flex outline-none text-white font-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                  </svg>
                   Contact Us</a></li>
                <li class="p-3 m-1"><a href="#" class="flex outline-none text-white font-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                  </svg>
                   More</a></li>
            </ul>
        </div>
    </div>
        <div class="w-full mt-10 pt-12 grid px-4  justify-items-center">
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
                <div class="container mx-auto mt-10">
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

            <h2 class="mb-6 w-full uppercase text-black p-1 font-bold text-center rounded">Products</h2>
            <button class="flex">
                <a href="/products/create" title="Add New Product"
                    class="mr-1 bg-green-600 flex hover:bg-green-800 text-sm text-white py-1 px-2 no-underline rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5 my-auto">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Add
                    New</a>

                <a href="/index" title="Home"
                    class="bg-green-600 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5 my-auto">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>

                    Home</a>
                    <a href="#" title="Get as csv file"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Get CSV</a>
                    <a href="#" title="Get as pdf file"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Get PDF</a>
                    <a href="/pie-chart-products" title="View as a file chart"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Pie Chart</a>
                    <a href="/bar-chart-products" title="View as a file chart"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Bar Chart</a>
                    <a href="/graph-products" title="View as a file chart"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Graph</a>

            </button>
            <table class="border  w-full my-2 mx-auto table-auto border-black shadow-lg rounded">

                @if($products->isEmpty())
                <p class="text-sm text-red-500">No Record Found</p>
                @endif
                <thead class="p-2 m-2 border bg-black text-white border-black">
                    <tr class="p-2 m-2 border uppercase border-black">
                        {{-- <th class="sort p-2 m-2 border border-black cursor-pointer" data-column="product_id" data-order="desc">S.No</th> --}}
                        <th class="sort p-2 m-2 border border-black cursor-pointer" data-column="product_id" data-order="desc">Product Id</th>
                        <th class="sort flex space-x-1 p-2 m-2 border border-black" data-column="name" data-order="desc">Name
                          </th>
                        <th class="p-2 m-2 border border-black">Stock</th>
                        <th class="p-2 m-2 border border-black">Status</th>
                        <th class="sort flex justify-between p-2 m-2 border border-black" data-column="price" data-order="desc">Price<small>( &#8377 )</small></th>
                        <th class="p-2 m-2 border border-black">SKU <small class="font-thin">( Stock Keeping Unit)</small>
                        </th>
                        <th class="p-2 m-2 border border-black">Actions</th>
                    </tr>
                </thead>
                <tbody class="border ">
                    <tr>

                        @foreach ($products as $product)
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
                                    class="text-black text-sm border px-1 mx-1 py-1 my-1 w-2 bg-blue-200 hover:bg-blue-500 hover:text-white rounded">
                                    View
                                    Entries</a>
                                <a href="{{ url('/products/' . $product->id . '/edit') }}"
                                    class="text-pink font-normal border w-2 bg-pink-200 border-pink-200 hover:bg-pink-300 hover:text-white px-1 mx-1 py-1 my-1 rounded">Edit
                                </a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
</body>
