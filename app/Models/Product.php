<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalesInventoryProduct;

class Product extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $fillable = [
        'existencia'
    ];
    public function index()
    {
    $products = Product::with('inventory', 'salesInventoryProducts')->get();
    
    return view('stock', compact('products'));
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id');
    }

    public function salesInventoryProducts()
    {
        return $this->hasMany(SalesInventoryProduct::class, 'product_id');
    }
    
    
}
