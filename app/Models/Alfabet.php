<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alfabet extends Model
{
    use HasFactory;

    protected $table = 'alfabet'; // Tentukan nama tabel jika berbeda dengan nama model

    protected $fillable = [
        'alfabet', // Kolom alfabet
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Relasi dengan tabel Lessons
    public function lessons()
    {
        return $this->hasMany(Lessons::class, 'id_alfabet'); // Relasi satu ke banyak
    }
}
