<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesInventoryProduct extends Model
{
    protected $table = 'sales_inventory_products';

    protected $fillable = [
        'product_id',
        'quantity',
        'name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
