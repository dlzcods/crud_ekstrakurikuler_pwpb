<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'kelas',
        'nama'
    ];

    public function ekskuls() {
        return $this->belongsToMany(Ekskul::class, 'keanggotaans', 'siswa_id', 'ekskul_id');
    }

    public function perans() {
        return $this->belongsToMany(Peran::class, 'keanggotaans', 'siswa_id', 'peran_id')->withPivot('ekskul_id', 'id');
    }
}
