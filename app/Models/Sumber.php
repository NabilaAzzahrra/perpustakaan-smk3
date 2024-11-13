<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    protected $fillable = [
        'kode_sumber',
        'sumber'
    ];

    protected $table = 'sumber';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_sumber', 'desc')->value('kode_sumber');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'SM' . $formattedCodeNumber;
    }

    public function buku()
    {
        return $this->hasMany(Buku::class, 'kode_sumber');
    }
}
