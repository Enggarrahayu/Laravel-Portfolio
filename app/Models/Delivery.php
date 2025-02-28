<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends BaseModel
{
    use HasFactory;
    protected $guarded = [];

    public function route()
    {
        return $this->belongsTo(DeliveryRoute::class)->withDefault([
            'name' => '-'
        ]);
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'delivery_id', 'id');
    }
}
