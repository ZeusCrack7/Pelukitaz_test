<?php

namespace App\Http\Controllers;

use App\Models\SalesInventory;
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

        session()->flash('success_msg', '¡Cóbrale al cliente... Ya!');

        return redirect('/shop');    }
}
