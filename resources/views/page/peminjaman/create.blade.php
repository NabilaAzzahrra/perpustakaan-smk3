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
                    <form class="w-full mx-auto" method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf
                        <div class="flex gap-4">
                            <div class="mb-5 w-full">
                                <label for="kode_buku"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peminjam</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="id_user" id="id_user" data-placeholder="Pilih Peminjam">
                                    <option value="">Pilih...</option>
                                    @foreach ($user as $k)
                                        <option value="{{ $k->id }}">
                                            {{ $k->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="mb-5 w-full">
                                    <label for="tgl_peminjaman"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Peminjaman</label>
                                    <input type="date" id="tgl_peminjaman" name="tgl_peminjaman"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Buku" required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tgl_pengembalian"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Pengembalian</label>
                                    <input type="date" id="tgl_pengembalian" name="tgl_pengembalian"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Buku" readonly required />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-xl mb-2">
                            <div class="flex items-center justify-between">
                                <div>DATA BUKU</div>
                                <div><button id="addRowBtn"
                                        class="bg-sky-400 p-1 w-10 h-10 rounded-xl pt-2 text-white"><i
                                            class="fi fi-ss-add"></i></button></div>
                            </div>
                        </div>
                        <div class="border border-2 rounded-xl mb-2 p-2" id="bookContainer">
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#addRowBtn').click(function(event) {
                event.preventDefault();
                addRow();
            });
        });

        let rowCount = 0;

        function addRow() {
            rowCount++;

            // Tambahkan elemen dengan ID unik berdasarkan rowCount
            const newRow = `
        <div class="border border-2 rounded-xl mb-2 p-2" id="row${rowCount}">
            <div class="flex mb-2 gap-2">
                <div class="w-full">
                    <label for="id_buku${rowCount}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buku</label>
                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                        name="id_buku[]" id="id_buku${rowCount}" data-placeholder="Pilih Buku" onchange="return getBuku()">
                        <option value="">Pilih...</option>
                        @foreach ($buku as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="pengarang${rowCount}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                    <input type="text" id="pengarang${rowCount}" name="pengarang[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pengarang" readonly required />
                </div>
                <div class="w-full">
                    <label for="tahun_terbit${rowCount}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                    <input type="text" id="tahun_terbit${rowCount}" name="tahun_terbit[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tahun" readonly required />
                </div>
                <div class="w-[50px]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                    <button type="button" class="bg-red-400 p-1 w-10 h-10 rounded-xl pt-2 text-white" onclick="removeRow(${rowCount})"><i class="fi fi-ss-minus-circle"></i></button>
                </div>
            </div>
        </div>
    `;

            $('#bookContainer').append(newRow);

            $(`#id_buku${rowCount}`).select2({
                placeholder: "Pilih Buku"
            });
        }

        function removeRow(rowId) {
            // Menghapus elemen berdasarkan rowId
            $(`#row${rowId}`).remove();
            updateRowNumbers();
        }

        function updateRowNumbers() {
            // Mengupdate nomor urut setiap elemen di dalam #bookContainer
            $('#bookContainer .border').each(function(index) {
                $(this).find('label:first').html(`Buku ${index + 1}`);
            });
        }
    </script>
    <script>
        document.getElementById('tgl_peminjaman').addEventListener('change', function() {
            const peminjamanDate = new Date(this.value);

            if (!isNaN(peminjamanDate.getTime())) { // Check if it's a valid date
                // Add 7 days
                peminjamanDate.setDate(peminjamanDate.getDate() + 7);

                // Format to YYYY-MM-DD to set the value of the input
                const year = peminjamanDate.getFullYear();
                const month = String(peminjamanDate.getMonth() + 1).padStart(2, '0');
                const day = String(peminjamanDate.getDate()).padStart(2, '0');

                document.getElementById('tgl_pengembalian').value = `${year}-${month}-${day}`;
            }
        });
    </script>
    <script>
        const getBuku = async () => {
            var id_bukuElement = document.getElementById(`id_buku${rowCount}`);
            var selectedOption = id_bukuElement.options[id_bukuElement.selectedIndex];
            var baseUrl = $('#base_url').val();
            var data = selectedOption.value;

            await axios.get(`/buku/buku_name/${data}`)
                .then((response) => {
                    console.log(response);
                    document.getElementById(`pengarang${rowCount}`).value = response.data.buku.pengarang;
                    document.getElementById(`tahun_terbit${rowCount}`).value = response.data.buku.tahun_terbit;
                })
                .catch((error) => {
                    console.log(error);
                });
        };
    </script>
</x-app-layout>
