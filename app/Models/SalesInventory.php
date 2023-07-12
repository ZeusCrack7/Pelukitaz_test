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
        return $this->belongsToMany(Product::class, 'sales_inventory_products')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function index()
{
    $soldProducts = SalesInventory::all();

    return view('sales.index', ['soldProducts' => $soldProducts]);
}




}
