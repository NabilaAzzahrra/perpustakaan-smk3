<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $fillable = [
        'kode_penerbit',
        'penerbit',
        'alamat'
    ];

    protected $table = 'penerbit';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_penerbit', 'desc')->value('kode_penerbit');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'PN' . $formattedCodeNumber;
    }

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kode_penerbit');
    }
}
