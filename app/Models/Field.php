<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['code', 'name', 'description'];

    public function specialities()
    {
        return $this->hasMany(Speciality::class, 'field_id');
    }
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'field_rooms',  'field_id', 'room_id');
    }
}
