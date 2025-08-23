<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'description'];

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'field_rooms', 'room_id',  'field_id');
    }
}
