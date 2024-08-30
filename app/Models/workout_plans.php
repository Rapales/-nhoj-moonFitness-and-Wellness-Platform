<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout_plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'member_id',
        'title',
        'description',
        'workout_video_link',
        'workout_date',
        'status',
    ];

    public function usersMembers()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }

    public function usersTrainers()
    {
        return $this->belongsTo(User::class, 'trainer_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
