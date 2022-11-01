<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'nama_pembina'
    ];

    public function anggotas() {
        return $this->hasMany(Anggota::class);
    }
}
