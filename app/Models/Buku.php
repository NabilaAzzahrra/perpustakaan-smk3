<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'kode_buku',
        'pengarang',
        'judul',
        'kode_penerbit',
        'kode_genre',
        'tahun_terbit',
        'sinopsis',
        'halaman',
        'ebook',
        'kode_fakultas',
        'status',
        'kode_sumber',
    ];

    protected $table = 'buku';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_buku', 'desc')->value('kode_buku');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'BK' . $formattedCodeNumber;
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'kode_penerbit', 'kode_penerbit');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'kode_genre', 'kode_genre');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'kode_fakultas', 'kode_fakultas');
    }

    public function sumber()
    {
        return $this->belongsTo(Sumber::class, 'kode_sumber', 'kode_sumber');
    }

    public function detail()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_buku');
    }
}
