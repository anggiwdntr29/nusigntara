<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonSaved extends Model
{
    use HasFactory;

    protected $table = 'lessons_saved'; // Tentukan nama tabel jika berbeda dengan nama model

    protected $fillable = [
        'id_user',
        'id_lessons',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Relasi dengan tabel User (anggap sudah ada model User)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Relasi ke tabel user
    }

    // Relasi dengan tabel Lessons
    public function lessons()
    {
        return $this->belongsTo(Lessons::class, 'id_lessons'); // Relasi ke tabel lessons
    }
}
