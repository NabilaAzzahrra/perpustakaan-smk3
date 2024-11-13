<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex p-4">
                <div>
                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('kelas.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="kode_kelas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Kelas</label>
                            <input type="text" id="kode_kelas" name="kode_kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kode Kelas" value="{{ $kodeKelas }}" readonly required />
                        </div>
                        <div class="mb-5">
                            <label for="kelas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                            <input type="text" id="kelas" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Kelas" />
                        </div>
                        <div class="mb-5">
                            <label for="kode_jurusan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Jurusan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="kode_jurusan" id="kode_jurusan" data-placeholder="Pilih Jurusan">
                                <option value="">Pilih...</option>
                                @foreach ($jurusan as $k)
                                    <option value="{{ $k->kode_jurusan }}">
                                        {{ $k->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
                <div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE KELAS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KELAS
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        KODE JURUSAN
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
                                @foreach ($kelas as $f)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $f->kode_kelas }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->kelas }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $f->jurusan->jurusan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button"
                                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                data-id="{{ $f->id }}" data-kode_kelas="{{ $f->kode_kelas }}"
                                                data-kelas="{{ $f->kelas }}"
                                                data-kode_jurusan="{{ $f->kode_jurusan }}">
                                                <i class="fi fi-sr-file-edit"></i>
                                            </button>
                                            <button
                                                class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                onclick="return dataDelete('{{ $f->id }}','{{ $f->kelas }}')">
                                                <i class="fi fi-sr-delete-document"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $kelas->links() }}
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
                                Kelas</label>
                            <input type="text" id="kode_kelas_edit" name="kode_kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kode kelas disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kelas</label>
                            <input type="text" id="kelas_edit" name="kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="" placeholder="Masukan kelas disini...">
                        </div>
                        <div class="mb-5">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                Jurusan</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                name="kode_jurusan_edit" id="kode_jurusan_edit" data-placeholder="Pilih Jurusan">
                                <option value="">Pilih...</option>
                                @foreach ($jurusan as $k)
                                    <option value="{{ $k->kode_jurusan }}">
                                        {{ $k->jurusan }}</option>
                                @endforeach
                            </select>
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
            const id = button.dataset.id;
            const kode_kelas = button.dataset.kode_kelas;
            const kelas = button.dataset.kelas;
            const kode_jurusan = button.dataset.kode_jurusan;

            let url = "{{ route('kelas.update', ':id') }}".replace(':id', id);
            console.log(url);

            let status = document.getElementById(modalTarget);
            document.getElementById('title_source').innerText = `Update Kelas ${kelas}`;
            document.getElementById('kode_kelas_edit').value = kode_kelas;
            document.getElementById('kelas_edit').value = kelas;
            // document.getElementById('kode_jurusan_edit').value = kode_jurusan;
            let event = new Event('change');
            document.querySelector('[name="kode_jurusan_edit"]').value = kode_jurusan;
            document.querySelector('[name="kode_jurusan_edit"]').dispatchEvent(event);

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
        const dataDelete = async (id, kelas) => {
            let tanya = confirm(`Apakah anda yakin untuk menghapus Kelas ${kelas} ?`);
            if (tanya) {
                await axios.post(`/kelas/${id}`, {
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
