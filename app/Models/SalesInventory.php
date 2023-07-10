<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInventory extends Model
{
    use HasFactory;

    protected $table = 'sales_inventory';

    protected $fillable = [
        'quantity',
        'time',
    ];
    public function products()
{
    return $this->belongsToMany(Product::class, 'sales_inventory_products', 'sales_inventory_id', 'product_id')
        ->withPivot('quantity')
        ->withTimestamps();
}

}
