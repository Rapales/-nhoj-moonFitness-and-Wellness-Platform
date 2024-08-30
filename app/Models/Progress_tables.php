<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress_tables extends Model
{
    use HasFactory;

    protected $table = 'progress_tables';
    protected $primaryKey = 'id';
    protected $fillable = [
        'member_id',
        'workout_img',
        'task_description',
        'task_status',
    ];
}
