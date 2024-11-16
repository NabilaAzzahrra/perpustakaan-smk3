<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg p-4 rounded-xl mb-2 flex items-center justify-between">
                <div>DATA VERIFIKASI PEMINJAMAN</div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex p-4">
                <div class="overflow-x-auto">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase ">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-100">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE PEMINJAMAN
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100">
                                        NAMA
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JUMLAH BUKU
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100">
                                        TANGGAL PEMINJAMAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TANGGAL PENGEMBALIAN
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100">
                                        STATUS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        VERIFIKASI
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-100">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($peminjaman as $f)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $f->kode_peminjaman }}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-100">
                                            {{ $f->id_user }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->jumlah_buku }}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-100">
                                            {{ $f->tgl_peminjaman }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->tgl_pengembalian }}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-100">
                                            {{ $f->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->verifikasi }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-1 bg-gray-100">
                                            <form action="{{ route('peminjaman.verifikasiPinjam', $f->id) }}"
                                                method="post" onsubmit="return confirmSubmit()">
                                                @csrf
                                                @method('PATCH')
                                                <button
                                                    class="bg-emerald-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-emerald-500"
                                                    type="submit">
                                                    <i class="fi fi-ss-check-circle"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $peminjaman->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmSubmit() {
            return confirm('Apakah anda yakin untuk verifikasi peminjaman ini?');
        }
    </script>
</x-app-layout>
