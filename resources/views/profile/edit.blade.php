<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- @can('role-A') --}}
            <div class="max-w-4xl mx-auto px-12 sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  gap-5 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="flex p-4 gap-5 bg-gray-100 rounded-xl">
                            <div class="ms-1 ml-[15px]">
                                <img src="{{ url('img/user.png') }}" alt="" srcset=""
                                    class="lg:w-20 w-14">
                            </div>
                            <div class="mt-2">
                                <div class="font-bold">{{ $admin->name }}</div>
                                <div>{{ $admin->email }}</div>
                                <div class="text-sm">{{ $admin->role == 'A' ? 'Administrator' : 'User' }}</div>
                            </div>
                        </div>
                        <div class="p-4 gap-5 bg-gray-100 rounded-xl mt-4">
                            <div
                                class="bg-sky-200 p-2 border border-2 border-black rounded-xl w-full text-center font-bold">
                                SETTING PASSWORD</div>
                            <div>
                                <form action="{{ route('profile.updatePass', $admin->id) }}" method="post"
                                    id="passwordForm">
                                    @csrf
                                    @method('PATCH')
                                    <div class="p-4 rounded-xl">
                                        <div class="lg:flex-row gap-5">
                                            <div class="flex flex-col lg:flex-row gap-5 w-full">
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="newPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                        Baru</label>
                                                    <input type="password" id="newPassword" name="newPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Password Baru disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleNewPassword"></i>
                                                </div>
                                                <div class="lg:mb-5 w-full relative">
                                                    <label for="konfirPassword"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                                        Password</label>
                                                    <input type="password" id="konfirPassword" name="konfirPassword"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Konfirmasi Password disini ..." />
                                                    <i class="fi fi-ss-eye absolute right-4 top-10 cursor-pointer"
                                                        id="toggleConfirmPassword"></i>
                                                    <span id="passwordError" class="text-red-500 text-sm hidden">Passwords
                                                        do not match!</span>
                                                    <span id="passwordMatch"
                                                        class="text-green-500 text-sm hidden">Passwords match!</span>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        {{-- @endcan --}}

    </div>
</x-app-layout>
<script>
    const getResult = async () => {
        const identity = document.getElementById('identity').value;
        console.log(identity);

        await axios.get(`https://api.politekniklp3i-tasikmalaya.ac.id/pmb/applicants/${identity}`, {
                headers: {
                    'lp3i-api-key': 'aEof9XqcH34k3g6IbJcQLxGY',
                }
            })
            .then((response) => {
                const data = response.data;
                const dataGender = data.data.gender;
                console.log(data);

                document.getElementById('email_account').innerText = data.account.email;
                document.getElementById('password_account').innerText = data.account.phone;
                document.getElementById('namaLengkap').innerText = data.account.name;
                document.getElementById('tempatLahir').innerText = data.data.placeOfBirth;
                document.getElementById('tanggalLahir').innerText = data.data.dateOfBirth;
                if (dataGender == true) {
                    document.getElementById('jenisKelamin').innerText = "Laki-laki";
                } else {
                    document.getElementById('jenisKelamin').innerText = "Perempuan";
                }
                document.getElementById('alamat').innerText = data.data.address;
                document.getElementById('noHandphone').innerText = data.account.phone;
                document.getElementById('emailContact').innerText = data.data.email;
                document.getElementById('asalSekolah').innerText = data.data.schoolapplicant.name;
                document.getElementById('jurusan').innerText = data.data.major;
                document.getElementById('tahunLulus').innerText = data.data.year;

                document.getElementById('namaAyah').innerText = data.father.name;
                document.getElementById('pekerjaanAyah').innerText = data.father.job;
                document.getElementById('pendidikanAyah').innerText = data.father.education;
                document.getElementById('noHandphoneAyah').innerText = data.father.phone;

                document.getElementById('namaIbu').innerText = data.mother.name;
                document.getElementById('pekerjaanIbu').innerText = data.mother.job;
                document.getElementById('pendidikanIbu').innerText = data.mother.education;
                document.getElementById('noHandphoneIbu').innerText = data.mother.phone;
            })
            .catch((error) => {
                console.log(error);
            });
    }
    getResult();
</script>
<script>
    document.getElementById('copyEmail').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var emailText = document.getElementById('email_account').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = emailText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Email telah disalin: ' + emailText);
    });

    document.getElementById('copyPassword').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var emailText = document.getElementById('password_account').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = emailText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Password telah disalin: ' + emailText);
    });

    document.getElementById('copyUserSiakad').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var userText = document.getElementById('userSiakad').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = userText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Username Siakad telah disalin: ' + userText);
    });

    document.getElementById('copyPassSiakad').addEventListener('click', function() {
        // Ambil elemen dengan id "email_account"
        var passText = document.getElementById('passSiakad').innerText;

        // Buat elemen input sementara untuk menyalin teks
        var tempInput = document.createElement('input');
        tempInput.value = passText;
        document.body.appendChild(tempInput);

        // Pilih teks dan salin ke clipboard
        tempInput.select();
        document.execCommand('copy');

        // Hapus elemen input sementara setelah selesai
        document.body.removeChild(tempInput);

        // Berikan notifikasi (opsional)
        alert('Password Siakad telah disalin: ' + passText);
    });
</script>
{{-- <script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const nim = button.dataset.nim;
        const nama = button.dataset.nama;
        const tempat_lahir = button.dataset.tempat_lahir;
        const tgl_lahir = button.dataset.tgl_lahir;
        const no_hp = button.dataset.no_hp;
        let url = "{{ route('mahasiswa.profilUpdate', ':id') }}".replace(':id', id);
        console.log(url);
        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `Update Profile SIAKAD`;

        document.getElementById('nim').value = nim;
        document.getElementById('nama').value = nama;
        document.getElementById('tempat_lahir').value = tempat_lahir;
        document.getElementById('tgl_lahir').value = tgl_lahir;
        document.getElementById('no_hp').value = no_hp;

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
</script> --}}
<script>
    function openTab(evt, tabName) {
        // Menyembunyikan semua konten tab
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Menghapus kelas aktif dari semua tombol tab
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("bg-gray-100", "text-blue-600", "dark:bg-gray-800", "dark:text-blue-500");
            tablinks[i].classList.add("text-gray-600", "bg-white", "dark:bg-gray-700", "dark:text-gray-400");
        }

        // Menampilkan konten tab yang dipilih dan menambahkan kelas aktif
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("bg-gray-100", "text-blue-600", "dark:bg-gray-800", "dark:text-blue-500");
        evt.currentTarget.classList.remove("text-gray-600", "bg-white", "dark:bg-gray-700", "dark:text-gray-400");
    }

    // Buka tab pertama secara default
    document.querySelector('.tablinks').click();
</script>
<script>
    const toggleNewPassword = document.querySelector('#toggleNewPassword');
    const newPassword = document.querySelector('#newPassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassword = document.querySelector('#konfirPassword');
    const passwordError = document.querySelector('#passwordError');
    const passwordMatch = document.querySelector('#passwordMatch');
    const passwordForm = document.querySelector('#passwordForm');

    // Toggle password visibility
    toggleNewPassword.addEventListener('click', function() {
        const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        newPassword.setAttribute('type', type);
        this.classList.toggle('fi-ss-eye');
        this.classList.toggle('fi-sr-eye-crossed');
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.classList.toggle('fi-ss-eye');
        this.classList.toggle('fi-sr-eye-crossed');
    });

    // Check if passwords match
    confirmPassword.addEventListener('input', function() {
        if (confirmPassword.value !== newPassword.value) {
            passwordError.classList.remove('hidden'); // Show error
            passwordMatch.classList.add('hidden'); // Hide success
        } else if (confirmPassword.value !== '') {
            passwordError.classList.add('hidden'); // Hide error
            passwordMatch.classList.remove('hidden'); // Show success
        }
    });

    // Prevent form submission if passwords don't match
    passwordForm.addEventListener('submit', function(event) {
        if (confirmPassword.value !== newPassword.value) {
            event.preventDefault(); // Stop form submission
            passwordError.classList.remove('hidden'); // Show error
            passwordMatch.classList.add('hidden'); // Hide success
        }
    });
</script>
