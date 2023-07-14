<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $inventory = new Inventory;
    $inventory->product_id = $validatedData['product_id'];
    $inventory->quantity = $validatedData['quantity'];
    $inventory->save();

    return redirect()->route('products.stock')->with('success', 'Cantidad agregada al inventario exitosamente');
}

}
