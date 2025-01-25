<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;

    protected $table = 'lessons'; 

    protected $fillable = [
        'id_alfabet',
        'text_indo',
        'text_eng',
        'image',
        'text_illustration',
        'video_sibi',
        'video_bisindo',
        'video_asl',
    ];

    protected $hidden = [
        'id_alfabet',
        'created_at',
        'updated_at',
    ];

    public function alfabet()
    {
        return $this->belongsTo(Alfabet::class, 'id_alfabet'); 
    }

    public function lessonsSaved()
    {
        return $this->hasMany(LessonSaved::class, 'id_lessons'); 
    }
}
