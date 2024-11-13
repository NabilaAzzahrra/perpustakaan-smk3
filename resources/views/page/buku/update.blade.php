<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="w-full mx-auto" method="POST" action="{{ route('buku.update', $buku->id) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="flex gap-4">
                            <div class="mb-5 w-full">
                                <label for="kode_buku"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Buku</label>
                                <input type="text" id="kode_buku" name="kode_buku"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Kode Buku" value="{{ $buku->kode_buku }}" readonly required />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="judul"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                <input type="text" id="judul" name="judul"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Judul" value="{{ $buku->judul }}" />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="pengarang"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
                                <input type="text" id="pengarang" name="pengarang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Pengarang" value="{{ $buku->pengarang }}" />
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="mb-5 w-full">
                                <label for="kode_penerbit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Penerbit</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="kode_penerbit" id="kode_penerbit" data-placeholder="Pilih Penerbit">
                                    <option value="{{ $buku->kode_penerbit }}">{{ $buku->penerbit->penerbit }}
                                    </option>
                                    @foreach ($penerbit as $k)
                                        @if ($k->kode_penerbit != $buku->kode_penerbit)
                                            <option value="{{ $k->kode_penerbit }}">
                                                {{ $k->penerbit }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="kode_genre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Genre</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="kode_genre" id="kode_genre" data-placeholder="Pilih Genre">
                                    <option value="{{ $buku->kode_genre }}">{{ $buku->genre->genre }}</option>
                                    @foreach ($genre as $k)
                                        @if ($k->kode_genre != $buku->kode_genre)
                                            <option value="{{ $k->kode_genre }}">
                                                {{ $k->genre }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="mb-5 w-full">
                                <label for="tahun_terbit"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                    Terbit</label>
                                <input type="text" id="tahun_terbit" name="tahun_terbit"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Tahun Terbit" value="{{ $buku->tahun_terbit }}" />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="halaman"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Halaman</label>
                                <input type="integer" id="halaman" name="halaman"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Halaman" value="{{ $buku->halaman }}" />
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="sinopsis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis</label>
                            <input type="text" id="sinopsis" name="sinopsis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required placeholder="Sinopsis" value="{{ $buku->sinopsis }}" />
                        </div>
                        <div class="flex gap-4">
                            <div class="mb-5 w-full">
                                <label for="ebooks"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ebook</label>
                                <input type="text" id="ebooks" name="ebooks"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Ebook" value="{{ $buku->ebook }}" readonly/>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="ebook"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ebook</label>
                                <input type="file" id="ebook" name="ebook"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Ebook"/>
                            </div>
                            <div class="mb-5 w-full">
                                <label for="kode_fakultas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Fakultas</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="kode_fakultas" id="kode_fakultas" data-placeholder="Pilih Fakultas">
                                    <option value="{{ $buku->kode_fakultas }}">{{ $buku->fakultas->fakultas }}
                                    </option>
                                    @foreach ($fakultas as $k)
                                        @if ($k->kode_fakultas != $buku->kode_fakultas)
                                            <option value="{{ $k->kode_fakultas }}">
                                                {{ $k->fakultas }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="mb-5 w-full">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <input type="text" id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Status" value="{{ $buku->status }}" />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="kode_sumber"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                    Sumber</label>
                                <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                    name="kode_sumber" id="kode_sumber" data-placeholder="Pilih Sumber">
                                    <option value="{{ $buku->kode_sumber }}">{{ $buku->sumber->sumber }}</option>
                                    @foreach ($sumber as $k)
                                        @if ($k->kode_sumber != $buku->kode_sumber)
                                            <option value="{{ $k->kode_sumber }}">
                                                {{ $k->sumber }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
