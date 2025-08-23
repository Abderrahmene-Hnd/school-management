<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseProfessor extends Model
{
    protected $fillable = ['course_id', 'professor_id'];
}
