<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg p-4 rounded-xl mb-2 flex items-center justify-between">
                <div>DATA PEMINJAMAN</div>
                <div>
                    <a href="{{ route('peminjaman.create') }}" class="bg-sky-400 p-2 rounded-xl text-white"><i
                            class="fi fi-sr-add-document"></i></a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex p-4">
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
                                    <th scope="col" class="px-6 py-3">
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
                                        <td class="px-6 py-4 flex gap-1">
                                            <a href="{{ route('peminjaman.edit', $f->id) }}"
                                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"><i
                                                    class="fi fi-sr-file-edit"></i></a>
                                            <button
                                                class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                onclick="return dataDelete('{{ $f->id }}','{{ $f->kode_peminjaman }}')">
                                                <i class="fi fi-sr-delete-document"></i>
                                            </button>
                                            <a href="{{ route('peminjaman.show', $f->id) }}"
                                                class="bg-emerald-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-emerald-500">
                                                <i class="fi fi-sr-document"></i>
                                            </a>
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
        const dataDelete = async (id, kode_peminjaman) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Peminjaman ${kode_peminjaman} ?`);
            if (tanya) {
                await axios.post(`/peminjaman/${id}`, {
                        '_method': 'DELETE',
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    })
                    .then(function(response) {
                        // Handle success
                        location.reload();
                    })
                    .catch(function(error) {
                        // Handle error
                        alert('Error deleting record');
                        console.log(error);
                    });
            }
        }
    </script>
</x-app-layout>
