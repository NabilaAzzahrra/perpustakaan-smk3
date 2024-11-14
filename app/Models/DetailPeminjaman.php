<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $fillable = [
        'kode_peminjaman',
        'id_buku',
        'status',
        'denda',
        'tgl_pengembalian',
        'tgl_kembali',
    ];

    protected $table = 'detail_peminjaman';

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'kode_peminjaman', 'kode_peminjaman');
    }

}
