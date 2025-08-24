<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['code', 'name', 'description', 'years', 'semestres', 'cycle_id'];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_levels',  'level_id', 'course_id');
    }
}
