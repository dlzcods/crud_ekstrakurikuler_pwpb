<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'ekskul_id',
        'peran_id',
        'kelas',
        'nama'
    ];

    public function ekskul() {
        return $this->belongsTo(Ekskul::class);
    }

    public function peran() {
        return $this->belongsTo(Peran::class);
    }
}
