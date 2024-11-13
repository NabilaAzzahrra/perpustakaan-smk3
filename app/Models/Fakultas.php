<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = [
        'kode_fakultas',
        'fakultas'
    ];

    protected $table = 'fakultas';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_fakultas', 'desc')->value('kode_fakultas');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'FK' . $formattedCodeNumber;
    }

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'kode_fakultas');
    }

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kode_fakultas');
    }
}
