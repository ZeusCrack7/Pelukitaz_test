<?php

namespace App\Http\Controllers;

use App\Models\SalesInventory;
use App\Models\Inventory;
use Illuminate\Http\Request;

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
            $sale->sales_inventory_products()->attach($cartItem->id, [
                'name' => $cartItem->name,
                'quantity' => $cartItem->quantity,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]);

            $inventory = new Inventory();
            $inventory->product_id = $cartItem->id;
            $inventory->quantity = $cartItem->quantity;
            $inventory->created_at = $currentTime;
            $inventory->updated_at = $currentTime;
            $inventory->save();
        }

        session()->flash('success_msg', '¡Cóbrale al cliente... Ya!');
        \Cart::clear();

        return redirect('/shop');
    }
}
