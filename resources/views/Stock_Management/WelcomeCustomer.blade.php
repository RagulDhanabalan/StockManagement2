<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</head>
<body>

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
        <h3 class="font-bold text-green-500">Welcome Customer</h3>
        <div class="btn">
        <button class="flex">
            <a href="/register-form" title="Add New Product"
                class="flex mr-1 bg-green-600 flex hover:bg-green-800 text-sm text-white py-1 px-2 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Add
                New</a>
                <a href="/index" title="Add New Product"
                class="flex mr-1 bg-green-600 flex hover:bg-green-800 text-sm text-white py-1 px-2 no-underline rounded"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="w-5 h-5 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Home</a>
            </div>
        <table class="border  w-full my-2 mx-auto table-auto border-black shadow-lg rounded">

            @if($customers->isEmpty())
            <p class="text-sm text-red-500">No Record Found</p>
            @endif
            <thead class="p-2 m-2 border bg-black text-white border-black">
                <tr class="p-2 m-2 border uppercase border-black">
                    {{-- <th class="sort p-2 m-2 border border-black cursor-pointer" data-column="product_id" data-order="desc">S.No</th> --}}
                    <th class="sort p-2 m-2 border border-black cursor-pointer" data-column="product_id" data-order="desc">Customer Name</th>
                    <th class="sort flex space-x-1 p-2 m-2 border border-black" data-column="name" data-order="desc">E-Mail ID
                      </th>
                </tr>
            </thead>
            <tbody class="border ">
                <tr>
                    @foreach ($customers as $customer)
                    {{-- <td class="m-2 p-2 text-center text-sm border">{{ $loop->iteration ?? 'None' }}</td> --}}
                    <td class="m-2 p-2 text-center text-sm border">{{ $customer->name ?? 'None' }}</td>
                        <td class="p-2 m-2 text-center text-sm border">{{ $customer->email ?? 'None' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}
</body>
</html>
