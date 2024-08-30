<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'specialization',
        'experience_year',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }
}
