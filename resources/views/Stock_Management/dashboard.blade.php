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
        <div class="lg:w-2/12 p-2 bg-black text-white w-1/3">
            <p class="text-gray-400 text-xl mt-6 mb-4 font-bold">Dashboard</p>
            <hr>
            <ul class="p-1">
                <li class=""><a href="/index" class="p-2 flex text-gray-400 hover:text-green-700"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Home</a></li>
                <li class=""><a href="#" class="p-2 flex text-gray-400 hover:text-green-700"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>
                        Inventory</a></li>
                <li class=""><a href="#" class="p-2 flex text-gray-400 hover:text-green-700"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        Track Orders</a></li>
                <li class=""><a href="#" class="p-2 flex text-gray-400 hover:text-green-700"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>

                        Log Out</a></li>
                <li class=""><a href="#" class="p-2 flex text-gray-400 hover:text-green-700"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        Settings</a></li>
            </ul>
        </div>
        <div class="lg:w-10/12 p-2">
            <div class="nav flex justify-between bg-gray-300 p-2 mb-12 rounded">
                <h1 class="font-bold text-xl">Stock Management</h1>
                <ul class="flex px-2">
                    <li class="mr-2"><a href="#"
                            class="hover:text-green-600 cursor-pointer text-green-500">Home</a></li>
                    <li class="mr-2"><a href="#"
                            class="hover:text-green-600 cursor-pointer text-green-500">Products</a></li>
                    <li class="mr-2"><a href="#"
                            class="hover:text-green-600 cursor-pointer text-green-500">Entries</a></li>
                    <li class=""><a href="#"
                            class="px-2 py-1 cursor-pointer font-bold rounded">Login</a></li>
                    <li class="mr-1"><a href="#"
                            class="px-2 py-1 cursor-pointer font-bold rounded">Register New</a></li>
                    <li></li>
                </ul>
            </div>
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

</html>
