<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Si-Perpus</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    {{-- Tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-[url('/img/landing.jpg')] bg-contain">
    <div
        class="relative flex items-top justify-center h-screen bg-white bg-cover bg-opacity-65 dark:bg-gray-900 sm:items-center py-[100px] lg:py-4 sm:pt-0 w-full">
        <div class="flex gap-5 items-center justify-center w-full mx-28">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg w-1/2 ml-48">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="font-bold p-4 bg-gray-100 rounded-xl">
                        FORM PENDAFTARAN AKUN
                    </div>
                    <form class="w-full mx-auto border border-2 p-4 mt-2 rounded-xl" method="POST" action="{{ route('koleksi.store') }}">
                        @csrf
                        <div class="mb-5 w-full">
                            <label for="nama"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Maukkan Nama" required />
                        </div>
                        <div class="mb-5 w-full">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Email" required />
                        </div>
                        <div class="mb-5 w-full">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan Password" required />
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
            <div class="w-full">
                <dotlottie-player src="{{ url('json/register.json') }}" background="transparent" speed="1" style="width: 800px; height: 800px;" loop autoplay></dotlottie-player>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</html>
