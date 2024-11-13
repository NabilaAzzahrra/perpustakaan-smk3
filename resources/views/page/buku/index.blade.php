<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg p-4 rounded-xl mb-2 flex items-center justify-between">
                <div>DATA BUKU</div>
                <div>
                    <a href="{{ route('buku.create') }}" class="bg-sky-400 p-2 rounded-xl text-white"><i class="fi fi-sr-add-document"></i></a>
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
                                        KODE BUKU
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        JUDUL
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE PENERBIT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE GENRE
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        TAHUN TERBIT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        SINOPSIS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        HALAMAN
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        EBOOK
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE FAKULTAS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        STATUS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE SUMBER
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
                                @foreach ($buku as $f)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $f->kode_buku }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->judul }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->penerbit->penerbit }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->genre->genre }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->tahun_terbit }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->sinopsis }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->halaman }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->ebook }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->fakultas->fakultas }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->status }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->sumber->sumber }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-1">
                                            <a href="{{route('buku.edit', $f->id)}}" class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"><i class="fi fi-sr-file-edit"></i></a>
                                            <button
                                                class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                onclick="return dataDelete('{{ $f->id }}','{{ $f->buku }}')">
                                                <i class="fi fi-sr-delete-document"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $buku->links() }}
                    </div>
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
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                Buku</label>
                            <input type="text" id="kode_buku_edit" name="kode_buku"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode buku disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Judul</label>
                            <input type="text" id="judul_edit" name="judul"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan judul disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                Penerbit</label>
                            <input type="text" id="kode_penerbit_edit" name="kode_penerbit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode penerbit disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Genre</label>
                            <input type="text" id="kode_genre_edit" name="kode_genre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode genre disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tahun
                                Terbit</label>
                            <input type="text" id="tahun_terbit_edit" name="tahun_terbit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan tahun terbit disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Sinopsis</label>
                            <input type="text" id="sinopsis_edit" name="sinopsis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan sinopsis disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Halaman</label>
                            <input type="integer" id="halaman_edit" name="halaman"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan halaman disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Ebook</label>
                            <input type="text" id="ebook_edit" name="ebook"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan ebook disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                Fakultas</label>
                            <input type="text" id="kode_fakultas_edit" name="kode_fakultas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode fakultas disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <input type="text" id="status_edit" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan status disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                Sumber</label>
                            <input type="text" id="kode_sumber_edit" name="kode_sumber"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode sumber disini...">
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
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;

            // Retrieve all data attributes
            const id = button.dataset.id;
            const kode_buku = button.dataset.kode_buku;
            const judul = button.dataset.judul;
            const kode_penerbit = button.dataset.kode_penerbit;
            const kode_genre = button.dataset.kode_genre;
            const tahun_terbit = button.dataset.tahun_terbit;
            const sinopsis = button.dataset.sinopsis;
            const halaman = button.dataset.halaman;
            const ebook = button.dataset.ebook;
            const kode_fakultas = button.dataset.kode_fakultas;
            const status = button.dataset.status;
            const kode_sumber = button.dataset.kode_sumber;

            // Replace the URL for the form action
            let url = "{{ route('buku.update', ':id') }}".replace(':id', id);
            formModal.setAttribute('action', url);

            // Set input fields with values from data attributes
            document.getElementById('kode_buku_edit').value = kode_buku;
            document.getElementById('judul_edit').value = judul;
            document.getElementById('kode_penerbit_edit').value = kode_penerbit;
            document.getElementById('kode_genre_edit').value = kode_genre;
            document.getElementById('tahun_terbit_edit').value = tahun_terbit;
            document.getElementById('sinopsis_edit').value = sinopsis;
            document.getElementById('halaman_edit').value = halaman;
            document.getElementById('ebook_edit').value = ebook;
            document.getElementById('kode_fakultas_edit').value = kode_fakultas;
            document.getElementById('status_edit').value = status;
            document.getElementById('kode_sumber_edit').value = kode_sumber;

            // Show the modal
            document.getElementById(modalTarget).classList.remove('hidden');
        };

        const dataDelete = async (id, buku) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Buku ${buku} ?`);
            if (tanya) {
                await axios.post(`/buku/${id}`, {
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

        const sourceModalClose = (button) => {
            const modalTarget = button.dataset.modalTarget;
            let status = document.getElementById(modalTarget);
            status.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
