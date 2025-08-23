<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    protected $fillable = ['name', 'description'];

    public function specialities()
    {
        return $this->belongsToMany(Cycle::class, 'cycle_specialities',  'cycle_id', 'speciality_id');
    }
    public function levels()
    {
        return $this->hasMany(Level::class, 'cycle_id');
    }
}
