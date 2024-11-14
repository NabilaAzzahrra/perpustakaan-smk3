<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-gray-100 text-xl font-bold p-4 rounded-full text-center">
                        FILTER PEMINJAMAN PERPUSTAKAAN
                    </div>
                    <div class="border border-2 mt-4 p-4 rounded-xl">
                        <form action="{{route('laporan.create')}}" method="get">
                            @csrf
                            <div class="flex gap-2">
                                <div class="mb-5 w-full">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">STATUS</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                        name="status" id="status" data-placeholder="Pilih Status">
                                        <option value="">Pilih...</option>
                                        <option value="PINJAM">PINJAM</option>
                                        <option value="KEMBALI">KEMBALI</option>
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DARI</label>
                                    <input type="date" id="dari" name="dari"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Kelas" />
                                </div>
                                <div class="mb-2 w-full">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SAMPAI</label>
                                    <input type="date" id="sampai" name="sampai"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required placeholder="Kelas" />
                                </div>
                            </div>
                            <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
