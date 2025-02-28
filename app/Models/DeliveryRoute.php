<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRoute extends BaseModel
{
    use HasFactory;
    protected $guarded = [];

    public function delivery()
    {
        return $this->hasMany(Delivery::class);
    }

    public function getRouteNameAttribute()
    {
        return $this->start_location . ' - ' . $this->end_location;
    }

}
