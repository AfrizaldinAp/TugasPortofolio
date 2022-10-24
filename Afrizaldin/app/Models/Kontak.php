<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'id_jenis',
        'deskripsi',

    ];
    protected $table = 'Kontak';
    public function siswa(){
        return $this->belongsTo(Siswa::class , 'id_siswa','id');
    }
    public function jeniskontak(){
        return $this->belongsTo(Jeniskontak::class ,'id_jenis', 'id');
    }
}
