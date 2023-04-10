<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';

    public function shop()
    {
        // return $this->hasOne(shop::class);
        return $this->belongsTo(shop::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'item_name',
        'item_num',
        'stock_at',
        'item_price',
        'item_loss',
        'user_name',
        'shop_id',
    ];
}
