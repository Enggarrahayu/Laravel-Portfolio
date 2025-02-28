<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function route()
    {
        return $this->belongsTo(DeliveryRoute::class)->withDefault([
            'name' => '-'
        ]);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
