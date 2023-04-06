<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    public function User(){
        return $this->hasMany('App\Models\User');
        // return $this->belongsTo('App\Models\User');
    }

    protected $primaryKey = 'shop_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'shop_name',
        'shop_address',
        'at1st',
        'at2nd',
        'at3rd',
        'loss_alert',
        'users_id',
    ];

}
