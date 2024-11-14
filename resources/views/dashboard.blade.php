<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('role-A')
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-amber-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-graduation-cap text-amber-800" style="font-size: 40px;"></i>
                            </div>
                            <div class="text-right text-amber-800">
                                <div>FAKULTAS</div>
                                <div><span class="bg-amber-400 px-2 rounded-xl text-black">{{ $fakultas }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-sky-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-ss-responsability text-sky-800"
                                    style="font-size: 40px;"></i></div>
                            <div class="text-right text-sky-800">
                                <div>JURUSAN</div>
                                <div><span class="bg-sky-400 px-2 rounded-xl text-black">{{ $jurusan }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-chalkboard-user text-red-800"
                                    style="font-size: 40px;"></i></div>
                            <div class="text-right text-red-800">
                                <div>KELAS</div>
                                <div><span class="bg-red-400 px-2 rounded-xl text-black">{{ $kelas }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-emerald-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-paper-plane-top text-emerald-800"
                                    style="font-size: 40px;"></i></div>
                            <div class="text-right text-emerald-800">
                                <div>PENERBIT</div>
                                <div><span class="bg-emerald-400 px-2 rounded-xl text-black">{{ $penerbit }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-pink-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-boxes text-pink-800" style="font-size: 40px;"></i></div>
                            <div class="text-right text-pink-800">
                                <div>GENRE</div>
                                <div><span class="bg-pink-400 px-2 rounded-xl text-black">{{ $genre }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-fuchsia-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-source-data text-fuchsia-800"
                                    style="font-size: 40px;"></i></div>
                            <div class="text-right text-fuchsia-800">
                                <div>SUMBER</div>
                                <div><span class="bg-fuchsia-400 px-2 rounded-xl text-black">{{ $sumber }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-purple-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-ss-book-open-cover text-purple-800"
                                    style="font-size: 40px;"></i></div>
                            <div class="text-right text-purple-800">
                                <div>BUKU</div>
                                <div><span class="bg-purple-400 px-2 rounded-xl text-black">{{ $buku }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-violet-200 p-4 rounded-xl shadow-lg">
                        <div class="flex gap-2 font-bold items-center justify-between">
                            <div class="mt-3"><i class="fi fi-sr-multitasking text-violet-800"
                                    style="font-size: 40px;"></i></div>
                            <div class="text-right text-violet-800">
                                <div>PEMINJAMAN</div>
                                <div><span class="bg-violet-400 px-2 rounded-xl text-black">{{ $peminjaman }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</x-app-layout>
