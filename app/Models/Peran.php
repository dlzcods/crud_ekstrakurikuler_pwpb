<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function anggotas() {
      return $this->belongsToMany(Siswa::class, 'keanggotaans', 'peran_id', 'siswa_id')->withPivot('ekskul_id');
    }
}
