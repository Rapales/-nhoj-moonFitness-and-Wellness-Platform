<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'member_id',
        'fitness_level',
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
