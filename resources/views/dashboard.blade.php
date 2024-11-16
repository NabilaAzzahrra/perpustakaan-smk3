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
                <div class="flex items-center justify-center">
                    <div>
                        <dotlottie-player src="{{ url('json/landing.json') }}" background="transparent" speed="1"
                            style="width: 500px; height: 500px;" loop autoplay></dotlottie-player>
                    </div>
                    <div class="text-wrap text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores nemo, unde, adipisci error veniam
                        dolor fugiat eligendi architecto quibusdam provident autem excepturi nisi nostrum. Porro
                        exercitationem praesentium illum ut aspernatur quisquam distinctio, velit accusamus. Minus
                        aspernatur mollitia porro corporis incidunt neque possimus explicabo minima adipisci est. Inventore
                        perferendis voluptates saepe!
                    </div>
                </div>
            @endcan
            @can('role-U')
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($listBuku as $index => $l)
                        <div class="bg-amber-100 p-4 rounded-2xl shadow-xl">
                            <div class="flex items-start">
                                <div class="mr-4"><img src="{{ asset('cover/' . $l->cover) }}" alt="Cover Buku"
                                        width="100"></div>
                                <div>
                                    <div class="text-left font-bold text-amber-800 rounded-xl text-lg text-wrap"
                                        id="title-{{ $index }}">
                                        {{ $l->judul }}
                                    </div>
                                    <div class="text-left text-sm">{{ $l->pengarang }}</div>
                                    <div class="text-sm text-center">
                                        Rekomendasi <span
                                            class="bg-white px-2 text-sm rounded-xl">{{ $l->fakultas->fakultas }}</span>
                                    </div>
                                    <div class="text-left text-sm mt-1 -ml-1" data-status="{{ $l->status }}"
                                        id="availability-{{ $index }}"><span
                                            class="text-sm bg-amber-100 px-1 font-bold">TIDAK
                                            TERSEDIA</span></div>
                                    <div class="text-center mt-2 text-sm">
                                        <button class="bg-sky-300 text-white p-2 rounded-xl hover:bg-sky-400"
                                            id="loan-button-{{ $index }}" data-id="{{ $l->id }}"
                                            onclick="handleLoanClick(event)">
                                            Ajukan Peminjaman
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    @endforeach
                </div>
            @endcan
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const maxLength = 25;

            document.querySelectorAll('[id^="title-"]').forEach(titleElement => {
                if (titleElement.innerText.length > maxLength) {
                    titleElement.innerText = titleElement.innerText.slice(0, maxLength) + "...";
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('[id^="availability-"]').forEach((availabilityElement, index) => {
                const status = availabilityElement.getAttribute('data-status');
                const availabilitySpan = availabilityElement.querySelector('span');
                const loanButton = document.getElementById(`loan-button-${index}`);

                // Update the availability text based on status
                if (status === "ADA") {
                    availabilitySpan.innerText = "TERSEDIA";
                } else {
                    availabilitySpan.innerText = "TIDAK TERSEDIA";
                    // Update the button style and disable it
                    loanButton.classList.remove("bg-sky-300", "hover:bg-sky-400");
                    loanButton.classList.add("bg-red-300", "cursor-not-allowed");
                    loanButton.disabled = true;
                }
            });
        });

        function handleLoanClick(event) {
            const bookId = event.target.getAttribute("data-id");

            window.location.href = "{{ route('peminjaman.pinjam', ['id' => '__bookId__']) }}".replace('__bookId__',
                bookId);
        }
    </script>
</x-app-layout>
