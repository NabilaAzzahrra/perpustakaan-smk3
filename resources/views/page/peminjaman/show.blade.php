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
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estimasi
                                                Pengembalian</label>
                                            <input type="text" id="tgl_pengembalian" name="tgl_pengembalian"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tahun" readonly required
                                                value="{{ $d->tgl_pengembalian }}" />
                                        </div>
                                        <div class="w-full">
                                            <label for="tgl_kembali"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                Kembali</label>
                                            <input type="date" id="tgl_kembali" name="tgl_kembali"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tahun" readonly required value="{{ $d->tgl_kembali }}" />
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
                                                @if ($d->tgl_kembali == 0)
                                                    <div class="w-full">
                                                        <button type="button"
                                                            class="bg-red-400 p-1 w-10 h-10 rounded-xl pt-2 text-white"
                                                            onclick="return dataReturn('{{ $d->id }}','{{ $d->buku->judul }}')">
                                                            <i class="fi fi-sr-undo"></i>
                                                        </button>
                                                    </div>
                                                    @if (date('Y-m-d') <= $d->tgl_pengembalian)
                                                        <div class="w-full">
                                                            <button type="button"
                                                                class="bg-amber-400 p-1 w-10 h-10 rounded-xl pt-2 text-white"
                                                                onclick="editSourceModal(this)"
                                                                data-modal-target="sourceModal"
                                                                data-id="{{ $d->id }}"
                                                                data-tgl_pengembalian="{{ $d->tgl_pengembalian }}">
                                                                <i class="fi fi-br-link"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endif
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Tambah Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Pengembalian</label>
                            <input type="date" id="tgl_pengembalian" name="tgl_pengembalian"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode penerbit disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        const dataReturn = async (id, judul) => {
            let tanya = confirm(`Apakah anda yakin untuk mengembalikan peminjaman buku ${judul} ?`);
            if (tanya) {
                await axios.post(`/detailReturn/${id}`, {
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

        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const tgl_pengembalian = button.dataset.tgl_pengembalian;

            let url = "{{ route('peminjaman.tglKembali', ':id') }}".replace(':id', id);
            console.log(url);

            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Tanggal Pengembalian`;
            document.getElementById('tgl_pengembalian').value = tgl_pengembalian;

            document.getElementById('formSourceButton').innerText = 'Simpan';
            document.getElementById('formSourceModal').setAttribute('action', url);
            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            status.classList.toggle('hidden');
        }

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
