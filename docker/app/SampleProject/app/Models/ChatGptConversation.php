<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGptConversation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relationship
    public function parent()
    {
        return $this->hasOne(ChatGptConversation::class, 'uid', 'parent_uid');
    }

    public function child()
    {
        return $this->hasOne(ChatGptConversation::class, 'uid', 'child_uid');
    }
}
