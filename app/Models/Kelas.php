<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = [
        'kode_kelas',
        'kelas',
        'kode_jurusan'
    ];

    protected $table = 'kelas';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_kelas', 'desc')->value('kode_kelas');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'KL' . $formattedCodeNumber;
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }
}
