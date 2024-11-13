<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'kode_jurusan',
        'jurusan',
        'kode_fakultas'
    ];

    protected $table = 'jurusan';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_jurusan', 'desc')->value('kode_jurusan');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'JR' . $formattedCodeNumber;
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'kode_fakultas', 'kode_fakultas');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kode_kelas');
    }
}
