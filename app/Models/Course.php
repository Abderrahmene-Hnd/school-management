<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name', 'description', 'duration', 'type', 'per_week', 'per_month'];

    public function levels()
    {
        return $this->belongsToMany(Course::class, 'course_levels', 'course_id',  'level_id');
    }
    public function professors()
    {
        return $this->belongsToMany(User::class, 'course_professors', 'course_id',  'professor_id');
    }
}
