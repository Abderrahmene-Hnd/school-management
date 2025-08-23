<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function levels()
    {
        return $this->belongsToMany(Course::class, 'course_levels', 'course_id',  'level_id');
    }
    public function professors()
    {
        return $this->belongsToMany(User::class, 'course_professors', 'course_id',  'professor_id');
    }
}
