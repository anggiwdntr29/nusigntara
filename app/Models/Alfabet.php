<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alfabet extends Model
{
    use HasFactory;

    protected $table = 'alfabet'; 

    protected $fillable = [
        'alfabet', 
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function lessons()
    {
        return $this->hasMany(Lessons::class, 'id_alfabet'); 
    }
}
