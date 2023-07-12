<?php

namespace App\Http\Controllers;

use App\Models\SalesInventory;
use Illuminate\Http\Request;
use App\Models\Product;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        $quantitySold = \Cart::getTotalQuantity();
        $currentTime = now();
    
        $sale = new SalesInventory();
        $sale->quantity = $quantitySold;
        $sale->time = $currentTime;
        $sale->save();
    
        $cartItems = \Cart::getContent();
    
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->id);
    
            $sale->sales_inventory_products()->attach($product, [
                'name' => $product->name,
                'quantity' => $cartItem->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        session()->flash('success_msg', '¡Cóbrale al cliente... Ya!');
        \Cart::clear();
    
        return redirect('/shop');
    }
        
}
