<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('laporan.store')}}" method="post">
                @csrf
                <div class="bg-white p-4 mb-2 rounded-xl">
                    <button type="submit"
                        class="bg-sky-500 m-2 w-40 h-10 px-4 py-2 rounded-xl text-white hover:shadow-lg hover:bg-sky-600"><i
                            class="fi fi-sr-print"></i></button>
                </div>
                <input type="hidden" value="{{$_GET['status']}}" name="status">
                <input type="hidden" value="{{$_GET['dari']}}" name="dari">
                <input type="hidden" value="{{$_GET['sampai']}}" name="sampai">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="overflow-x-auto">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                NO
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                KODE PEMINJAMAN
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                NAMA
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                JUMLAH BUKU
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                TANGGAL PEMINJAMAN
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                TANGGAL PENGEMBALIAN
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                STATUS
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
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $no++ }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $f->kode_peminjaman }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $f->id_user }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $f->jumlah_buku }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $f->tgl_peminjaman }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $f->tgl_pengembalian }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $f->status }}
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
            </form>
        </div>
    </div>
</x-app-layout>
