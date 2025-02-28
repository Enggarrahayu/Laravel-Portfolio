<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    use HasFactory;
    protected $guarded = [];

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'id', 'delivery_id');
    }
}
