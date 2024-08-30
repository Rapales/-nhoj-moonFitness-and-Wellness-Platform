<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workoutplan extends Model
{
    use HasFactory;

    protected $table = 'workoutplan';
    protected $primaryKey = 'id';
    protected $fillable = ['trainer_id', 'title','description', 'duration', 'type'];
}
