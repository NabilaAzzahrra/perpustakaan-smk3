<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SumberController;
use App\Models\Buku;
use App\Models\Fakultas;
use App\Models\Genre;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Sumber;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/fakultas', FakultasController::class)->middleware('auth');
Route::resource('/jurusan', JurusanController::class)->middleware('auth');
Route::resource('/kelas', KelasController::class)->middleware('auth');
Route::resource('/penerbit', PenerbitController::class)->middleware('auth');
Route::resource('/genre', GenreController::class)->middleware('auth');
Route::resource('/sumber', SumberController::class)->middleware('auth');
Route::resource('/buku', BukuController::class)->middleware('auth');
Route::resource('/peminjaman', PeminjamanController::class)->middleware('auth');
Route::resource('/laporan', LaporanController::class)->middleware('auth');
Route::get('/pinjam/{id}', [PeminjamanController::class, 'pinjam'])
    ->name('peminjaman.pinjam')
    ->middleware(['auth']);
Route::post('/ajukanPeminjaman', [PeminjamanController::class, 'ajukanPeminjaman'])
    ->name('peminjaman.ajukanPeminjaman')
    ->middleware(['auth']);
Route::get('/buku/buku_name/{id}', [BukuController::class, 'getBuku'])->middleware(['auth']);
Route::get('/verifikasi-peminjaman', [PeminjamanController::class, 'verifikasiPeminjaman'])->name('peminjaman.verifikasiPeminjaman')->middleware(['auth']);
Route::patch('/verifikasiPinjam/{id}', [PeminjamanController::class, 'verifikasiPinjam'])->name('peminjaman.verifikasiPinjam')->middleware(['auth']);
Route::resource('/koleksi', KoleksiController::class);
Route::delete('/detailDelete/{id}', [PeminjamanController::class, 'detailDelete'])->middleware(['auth']);
Route::delete('/detailReturn/{id}', [PeminjamanController::class, 'detailReturn'])->middleware(['auth']);
Route::patch('/tglKembali/{id}', [PeminjamanController::class, 'tglKembali'])
    ->middleware(['auth'])
    ->name('peminjaman.tglKembali');
Route::patch('/updatePass/{id}', [ProfileController::class, 'updatePass'])->name('profile.updatePass');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $buku = Buku::count('id');
    $fakultas = Fakultas::count('id');
    $jurusan = Jurusan::count('id');
    $kelas = Kelas::count('id');
    $penerbit = Penerbit::count('id');
    $genre = Genre::count('id');
    $sumber = Sumber::count('id');
    $peminjaman = Peminjaman::where('tgl_peminjaman', date('Y-m-d'))->count('id');

    $listBuku = Buku::all();
    return view('dashboard')->with([
        'buku' => $buku,
        'fakultas' => $fakultas,
        'jurusan' => $jurusan,
        'kelas' => $kelas,
        'penerbit' => $penerbit,
        'genre' => $genre,
        'sumber' => $sumber,
        'peminjaman' => $peminjaman,
        'listBuku' => $listBuku,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
