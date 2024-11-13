<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\SumberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// FAKULTAS
Route::get('/fakultas', [FakultasController::class, 'index']);
Route::post('/fakultasAdd', [FakultasController::class, 'store']);
Route::patch('/fakultasUpdate/{id}', [FakultasController::class, 'update']);
Route::delete('/fakultasDelete/{id}', [FakultasController::class, 'destroy']);

// JURUSAN
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/jurusanAdd', [JurusanController::class, 'store']);
Route::patch('/jurusanUpdate/{id}', [JurusanController::class, 'update']);
Route::delete('/jurusanDelete/{id}', [JurusanController::class, 'destroy']);

//KELAS
Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/kelasAdd', [KelasController::class, 'store']);
Route::patch('/kelasUpdate/{id}', [KelasController::class, 'update']);
Route::delete('/kelasDelete/{id}', [KelasController::class, 'destroy']);

//PENERBIT
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::post('/penerbitAdd', [PenerbitController::class, 'store']);
Route::patch('/penerbitUpdate/{id}', [PenerbitController::class, 'update']);
Route::delete('/penerbitDelete/{id}', [PenerbitController::class, 'destroy']);

//GENRE
Route::get('/genre', [GenreController::class, 'index']);
Route::post('/genreAdd', [GenreController::class, 'store']);
Route::patch('/genreUpdate/{id}', [GenreController::class, 'update']);
Route::delete('/genreDelete/{id}', [GenreController::class, 'destroy']);

//SUMBER
Route::get('/sumber', [SumberController::class, 'index']);
Route::post('/sumberAdd', [SumberController::class, 'store']);
Route::patch('/sumberUpdate/{id}', [SumberController::class, 'update']);
Route::delete('/sumberDelete/{id}', [SumberController::class, 'destroy']);

//BUKU
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/bukuAdd', [BukuController::class, 'store']);
Route::patch('/bukuUpdate/{id}', [BukuController::class, 'update']);
Route::delete('/bukuDelete/{id}', [BukuController::class, 'destroy']);

// PEMINJAMAN
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::post('/peminjamanAdd', [PeminjamanController::class, 'store']);
Route::patch('/peminjamanUpdate/{id}', [PeminjamanController::class, 'update']);
Route::delete('/peminjamanDelete/{id}', [PeminjamanController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
