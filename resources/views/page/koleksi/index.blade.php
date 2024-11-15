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

    <!-- Styles -->
    {{-- <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style> --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('public/img/landing.jpg')
        }

        .bg-custom {
            position: relative;
            z-index: 1;
            /* color: white; */
            /* Just to make content visible on the transparent background */
        }

        .bg-custom::before {
            content: '';
            background-image: url('{{ url('img/landing.jpg') }}');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            /* Adjust the transparency here */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-[url('img/landing.jpg')] bg-contain">
    <div
        class="relative flex items-top justify-center h-screen bg-white bg-cover bg-opacity-65 dark:bg-gray-900 sm:items-center py-[100px] lg:py-4 sm:pt-0">
        <div class="grid grid-cols-5 gap-5 w-full -mt-[650px] mx-6">
            @foreach ($buku as $index => $l)
                <div class="bg-amber-100 p-4 rounded-2xl shadow-xl">
                    <div class="flex items-start">
                        <div class="mr-4"><img src="{{ asset('cover/' . $l->cover) }}" alt="Cover Buku"
                                width="100"></div>
                        <div>
                            <div class="text-left font-bold text-amber-800 rounded-xl text-lg text-wrap"
                                id="title-{{ $index }}">
                                {{ $l->judul }}
                            </div>
                            <div class="text-left text-sm">{{ $l->pengarang }}</div>
                            <div class="text-sm text-center">
                                Rekomendasi <span
                                    class="bg-white px-2 text-sm rounded-xl">{{ $l->fakultas->fakultas }}</span>
                            </div>
                            <div class="text-left text-sm mt-1 -ml-1" data-status="{{ $l->status }}"
                                id="availability-{{ $index }}"><span
                                    class="text-sm bg-amber-100 px-1 font-bold">TIDAK
                                    TERSEDIA</span></div>
                            <div class="text-center mt-2 text-sm">
                                <button class="bg-sky-300 text-white p-2 rounded-xl hover:bg-sky-400"
                                    id="loan-button-{{ $index }}" onclick="handleLoanClick(event)">
                                    Ajukan Peminjaman
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('[id^="availability-"]').forEach((availabilityElement, index) => {
            const status = availabilityElement.getAttribute('data-status');
            const availabilitySpan = availabilityElement.querySelector('span');
            const loanButton = document.getElementById(`loan-button-${index}`);

            // Update the availability text based on status
            if (status === "ADA") {
                availabilitySpan.innerText = "TERSEDIA";
            } else {
                availabilitySpan.innerText = "TIDAK TERSEDIA";
                // Update the button style and disable it
                loanButton.classList.remove("bg-sky-300", "hover:bg-sky-400");
                loanButton.classList.add("bg-red-300", "cursor-not-allowed");
                loanButton.disabled = true;
            }
        });
    });

    function handleLoanClick(event) {
        // Menampilkan dialog konfirmasi
        const hasAccount = confirm("Apakah Anda sudah memiliki akun?");

        // Jika pengguna memilih "OK" (sudah punya akun), arahkan ke halaman login
        if (hasAccount) {
            window.location.href = "{{ route('login') }}";
        } else {
            // Jika pengguna memilih "Batal" (belum punya akun), arahkan ke halaman daftar
            window.location.href = "{{ route('koleksi.create') }}";
        }
    }
</script>

</html>
