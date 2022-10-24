<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'nama_project',
        'tanggal',
        'deskripsi',
        'foto',
    ];
    protected $table = 'project';
    public function siswa(){
        return $this->belongsTo(Siswa::class , 'id_siswa' , 'id'); 
    }
    }


