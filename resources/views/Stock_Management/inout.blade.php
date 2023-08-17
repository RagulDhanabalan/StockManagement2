<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products - In / Out</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="icon"
        href="https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
</head>

<body>
    <h2 class="text-center text-2xl">Products</h2>

    <div class="container mx-auto w-full">

        {{-- <div class="bg-gray-200 mt-4 text-center w-1/4 rounded">
            <p class="text-2xl">Inventory</p>
            <span class="text-green-600">Total IN :
                <strong>{{ $sumIn }}</strong></span><br>
            <span class="text-red-600">Total OUT :
                <strong>{{ $sumOut }}</strong></span>
        </div> --}}
        {{-- search bar start --}}
        <div class="search flex float-right bg-gray-200 w-1/4 mb-3 rounded">

            <form class="w-full">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-8 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Search Products..." required>
                    <button type="submit"
                        class="text-white text-center absolute right-2.5 top-2 bottom-2.5 focus:border-transparent bg-blue-700 hover:bg-blue-800 focus:ring-0 font-medium rounded-lg text-sm px-4 py-1 dark:hover:bg-blue-700">Search</button>
                </div>
            </form>

        </div>
        <h3 class="flex text-xl mr-3">Showing Results Between <p class="text-red-500 text-normal ml-3">{{ date('d-m-Y', strtotime($startDate)) }}<strong class="text-black"> & </strong>{{ date('d-m-Y', strtotime($endDate)) }}</p></h3>
        {{-- search bar end --}}
        <table class="mt-6 border mx-auto mb-2 w-full table-auto border-black shadow-lg">
            <thead class="border bg-black text-sm text-white border-black">
                <tr>
                    <th class="p-1 m-2 text-sm border border-black">Name</th>
                    <th class="p-1 m-2 text-sm border border-black">Quantity</th>
                    <th class="p-1 m-2 text-sm border border-black">Price</th>
                    <th class="p-1 m-2 text-sm border border-black">Value</th>
                    <th class="p-1 m-2 text-sm border border-black">Status</th>
                    <th class="p-1 m-2 text-sm border border-black">S.K.U</th>
                    <th class="p-1 m-2 text-sm border border-black">Type</th>
                    <th class="p-1 m-2 text-sm border border-black">Last Entry Date</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products->entries as $entry)

                        <tr @if ($loop->even) class="bg-yellow-200" @endif>
                            <td class="p-2 m-2 border text-center text-sm">{{ $products->name ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">{{ $entry->quantity ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">{{ $products->price ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">{{ $entry->value ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">{{ $products->status ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">{{ $products->s_k_u ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">{{ $entry->type ?? 'none' }}</td>
                            <td class="p-2 m-2 border text-center text-sm">
                                {{ date('d-m-Y', strtotime($entry->date)) ?? 'none' }}</td>
                        </tr>
                    {{-- @endforeach --}}
                @endforeach
            </tbody>
        </table>
        <a class="w-full text-center bg-green-400 text-sm text-white hover:bg-green-500 p-1 mt-3 rounded" href="/products">Back</a>
        {{-- {{ $products->links() }} --}}
    </div>
</body>

</html>
