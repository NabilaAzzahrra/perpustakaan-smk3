<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'kode_genre',
        'genre'
    ];

    protected $table = 'genre';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_genre', 'desc')->value('kode_genre');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'GR' . $formattedCodeNumber;
    }

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kode_genre');
    }
}
