<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_kontak',
    ];
    protected $table = 'Jenis_Kontak';

    public function siswa() {
        return $this->belongsTo(siswa::class);
    }
}
