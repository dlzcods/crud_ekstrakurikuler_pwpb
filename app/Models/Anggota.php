<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'kelas',
        'nama'
    ];

    public function ekskuls() {
        return $this->belongsToMany(Ekskul::class, 'keanggotaans', 'anggota_id', 'ekskul_id');
    }

    public function perans() {
        return $this->belongsToMany(Peran::class, 'keanggotaans', 'anggota_id', 'peran_id');
    }
}
