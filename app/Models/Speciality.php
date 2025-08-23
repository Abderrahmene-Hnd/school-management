<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = ['name', 'description', 'field_id'];

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
    public function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'cycle_specialities', 'speciality_id', 'cycle_id');
    }
}
