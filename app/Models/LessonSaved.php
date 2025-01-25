<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonSaved extends Model
{
    use HasFactory;

    protected $table = 'lessons_saved'; 

    protected $fillable = [
        'id_user',
        'id_lessons',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); 
    }

    public function lessons()
    {
        return $this->belongsTo(Lessons::class, 'id_lessons'); 
    }
}
