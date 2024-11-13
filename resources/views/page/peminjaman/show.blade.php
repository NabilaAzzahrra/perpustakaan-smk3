<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="w-full mx-auto" method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="bg-gray-100 p-4 rounded-xl mb-2">
                            <div class="flex items-center justify-between">
                                <div>DATA BUKU</div>
                            </div>
                        </div>
                        <div class="border border-2 rounded-xl mb-2 p-2">
                            @foreach ($detail as $d)
                                <div class="border border-2 rounded-xl mb-2 p-2" id="row">
                                    <div class="flex mb-2 gap-2">
                                        <input type="hidden" name="kode_peminjaman" value="{{ $d->kode_peminjaman }}">
                                        <input type="hidden" name="id_buku" value="{{ $d->id_buku }}">
                                        <div class="w-full">
                                            <label for="pengarang"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                            <input type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Pengarang" readonly required
                                                value="{{ $d->buku->judul }}" />
                                        </div>
                                        <div class="w-full">
                                            <label for="pengarang"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                                            <input type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Pengarang" readonly required
                                                value="{{ $d->buku->pengarang }}" />
                                        </div>
                                        <div class="w-full">
                                            <label for="tahun_terbit"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                                Peminjaman</label>
                                            <input type="text" id="status" name="status"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tahun" readonly required value="{{ $d->status }}" />
                                        </div>
                                        <div class="w-full">
                                            <label for="tahun_terbit"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Kembali</label>
                                            <input type="text" id="tgl_pengembalian" name="tgl_pengembalian"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tahun" readonly required
                                                value="{{ $d->tgl_pengembalian }}" />
                                        </div>
                                        <div class="w-full">
                                            <label for="tahun_terbit"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Denda</label>
                                            <input type="text" id="denda" name="denda"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tahun" readonly required value="{{ $d->denda }}" />
                                        </div>
                                        <div class="w-[50px]">
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                                            <div class="flex gap-2">
                                                <div class="w-full">
                                                    <button type="button"
                                                        class="bg-red-400 p-1 w-10 h-10 rounded-xl pt-2 text-white"
                                                        onclick="return dataDelete('{{ $d->id }}','{{ $d->buku->judul }}')"><i
                                                            class="fi fi-ss-minus-circle"></i></button>
                                                </div>
                                                <div class="w-full">
                                                    <button type="button"
                                                        class="bg-amber-400 p-1 w-10 h-10 rounded-xl pt-2 text-white"
                                                        onclick="return dataDelete('{{ $d->id }}','{{ $d->buku->judul }}')"><i
                                                            class="fi fi-ss-minus-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const dataDelete = async (id, judul) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus peminjaman buku ${judul} ?`);
            if (tanya) {
                await axios.post(`/detailDelete/${id}`, {
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

        document.addEventListener('DOMContentLoaded', function() {
            const status = document.getElementById('status').value;
            const tglPengembalian = document.getElementById('tgl_pengembalian').value;
            const dendaInput = document.getElementById('denda');
            const initialDenda = parseInt("{{ $d->denda }}", 10); // Get the denda from the database

            if (status === 'PINJAM' && tglPengembalian) {
                const returnDate = new Date(tglPengembalian);
                const currentDate = new Date();

                // Only calculate if the current date is past the return date
                if (currentDate > returnDate) {
                    const timeDiff = currentDate - returnDate;
                    const diffDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                    const denda = diffDays * 500;

                    // Set the fine (denda) in the input field
                    dendaInput.value = denda;
                } else {
                    // No fine if the due date is in the future
                    dendaInput.value = 0;
                }
            } else {
                // If status is not "PINJAM", show the database value if it's not 0
                dendaInput.value = initialDenda !== 0 ? initialDenda : 0;
            }
        });
    </script>
</x-app-layout>
