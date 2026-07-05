<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $fillable = [
    'first_name', 'last_name', 'phone',
    'address', 'city', 'product_id',
    'quantity', 'unit', 'total_price', 'status'
];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}