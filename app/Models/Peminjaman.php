<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'kode_peminjaman',
        'id_user',
        'jumlah_buku',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status',
        'verifikasi',
    ];

    protected $table = 'peminjaman';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

        public function detail()
        {
            return $this->hasMany(DetailPeminjaman::class, 'kode_peminjaman', 'kode_peminjaman');
        }

}
