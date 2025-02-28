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

    public function getTotalCostAttribute()
    {
        // Ensure the order and delivery route exist
        if (!$this->order || !$this->deliveryRoute) {
            return 0; // Return 0 if data is incomplete
        }

        // Extract values for readability
        $weight = $this->order->weight;
        $volume = $this->order->volume;
        $weightBasePrice = $this->deliveryRoute->weight_base_price;
        $volumeBasePrice = $this->deliveryRoute->volume_base_price;

        // Calculate cost based on weight and volume
        $weightPrice = $weight * $weightBasePrice;
        $volumePrice = $volume * $volumeBasePrice;

        // Nested if conditions for additional pricing logic
        if ($weight > 50 || $volume > 100) { // Check for large shipments
            if ($weight > 50 && $volume > 100) {
                // Apply a 10% discount for extra-large orders
                $weightPrice *= 0.9;
                $volumePrice *= 0.9;
            } elseif ($weight > 50) {
                // Apply a 5% discount for heavy orders
                $weightPrice *= 0.95;
            } elseif ($volume > 100) {
                // Apply a 5% discount for bulky orders
                $volumePrice *= 0.95;
            }
        }

        // Additional surcharge for lightweight but high-volume shipments
        if ($weight < 5 && $volume > 50) {
            $volumePrice += 20000; // Add a flat surcharge
        }

        // Nested loop example: Apply additional discount for specific weight ranges
        $discounts = [
            [10, 20, 0.02],  // 2% discount for 10-20kg
            [21, 30, 0.03],  // 3% discount for 21-30kg
            [31, 50, 0.05],  // 5% discount for 31-50kg
        ];

        foreach ($discounts as $discount) {
            [$minWeight, $maxWeight, $discountRate] = $discount;

            if ($weight >= $minWeight && $weight <= $maxWeight) {
                // Apply discount to both weight-based and volume-based prices
                foreach ([$weightPrice, $volumePrice] as &$price) {
                    $price *= (1 - $discountRate);
                }
                break; // Stop checking further discount brackets
            }
        }

        // Final cost is the higher of the two calculated prices
        return max($weightPrice, $volumePrice);
    }
}
