<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function Chat(){
        return $this->hasMany('App\Models\Chat');
        // return $this->belongsTo('App\Models\User');
    }

    protected $fillable = [
        
        'room_name',
        'room_intro',
        'created_name',
        'user_id',
        
    ];

}
