@extends('Stock_Management.index')
{{-- @section('content') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel = "icon" href = "https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais" type = "image/x-icon">
</head>

<body class="p-2 m-auto">
    @section('content')
    <div class="p-3 mx-6">
    <div class="p-2 mx-6 mt-1 grid justify-items-center w-90 mx-auto">
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
        <button class="flex">
            <a href="/entries/create" title="Add New Entry"
                class="flex mr-1 text-sm align-middle bg-green-600 hover:bg-green-800 text-white  py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Add New</a>
            <a href="/index" title="Home"
                class="flex text-sm bg-green-600 hover:bg-green-800 text-white py-1 px-3 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>Home</a>
                <a href="/export-csv-entry" title="Home"
                class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                Get CSV</a>
                <a href="/pdf-entries" title="Home"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Get PDF</a>
                    <a href="/pie-chart-entries" title="View as a file chart"
                    class="bg-green-600 ml-1 flex hover:bg-green-800 text-white text-sm py-1 px-2 no-underline rounded">
                    Pie Chart</a>
    </button>
</form>
{{-- <form action="/filter-entries" method="GET" class="w-full flex">
    @csrf
    <input type="text" name="search" value="{{ $searchTerm }}" class="ml-14 w-60 h-8 mr-2 px-1 rounded" placeholder="Search here..."
        required>
    <button type="submit" class="px-2 bg-blue-500 text-white rounded">Search</button>
         </form> --}}
</div>
        <div>
            <table class="border mx-auto w-full table-auto border-black shadow-lg">
                @if($entries->isEmpty())
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
        </div>

@endsection
</div>
</body>
