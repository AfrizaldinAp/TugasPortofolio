<?php

namespace App\Models;

use App\Models\Kontak;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'jk',
        'alamat',
        'email',
        'foto',
        'about',
        
    ];
    protected $table = 'siswa';
    public function kontak(){
        return $this->hasMany(Kontak::class  , 'id');
    }

    public function jenis_kontak() {
        return $this->hasMany(JenisKontak::class);
    }

    public function project(){
        return $this->hasMany(Project::class , 'id_siswa','id'); 
    }
}
