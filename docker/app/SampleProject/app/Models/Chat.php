<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Chat extends Model
{
    use HasFactory;

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }

    protected $fillable = [
        
        'user_name',
        'user_id',
        'room_id',
        'comment',
        
    ];

}
