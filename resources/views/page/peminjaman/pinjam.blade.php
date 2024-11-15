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
                    <form class="w-full mx-auto" method="POST" action="{{ route('peminjaman.ajukanPeminjaman') }}">
                        @csrf
                        <div class="flex gap-4">
                            <div class="mb-5 w-full hidden">
                                <label for="kode_buku"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peminjam</label>
                                <input type="text" id="id_user" name="id_user"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Kode Buku" required value="{{ Auth::user()->id }}" />
                            </div>
                            <div class="flex gap-4 w-full">
                                <div class="mb-5 w-full">
                                    <label for="tgl_peminjaman"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Peminjaman</label>
                                    <input type="date" id="tgl_peminjaman" name="tgl_peminjaman"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Buku" required value="{{ date('Y-m-d') }}" readonly />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tgl_pengembalian"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Pengembalian</label>
                                    <input type="date" id="tgl_pengembalian" name="tgl_pengembalian"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Buku" readonly required
                                        value="{{ date('Y-m-d', strtotime('+7 days')) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-2 rounded-xl mb-2">
                            <div class="flex items-center justify-between">
                                <div>DATA BUKU</div>
                            </div>
                        </div>
                        <div class="border border-2 rounded-xl mb-2 p-2" id="bookContainer">
                            <div class="border border-2 rounded-xl mb-2 p-2" id="row${rowCount}">
                                <div class="flex mb-2 gap-2">
                                    <input type="hidden" value="{{$buku->id}}" name="buku" id="buku">
                                    <div class="w-full">
                                        <label for="id_buku${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buku</label>
                                        <input type="text" id="judul" name="judul"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Pengarang" required readonly value="{{$buku->judul}}"/>
                                    </div>
                                    <div class="w-full">
                                        <label for="pengarang${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                                        <input type="text" id="pengarang${rowCount}" name="pengarang[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Pengarang" required readonly value="{{$buku->pengarang}}"/>
                                    </div>
                                    <div class="w-full">
                                        <label for="tahun_terbit${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun</label>
                                        <input type="text" id="tahun_terbit${rowCount}" name="tahun_terbit[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tahun" required readonly value="{{$buku->tahun_terbit}}"/>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="tahun_terbit${rowCount}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis</label>
                                    <textarea type="text" id="tahun_terbit${rowCount}" name="tahun_terbit[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Tahun" required readonly>{{$buku->sinopsis}}</textarea>
                                </div>

                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan Peminjaman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
