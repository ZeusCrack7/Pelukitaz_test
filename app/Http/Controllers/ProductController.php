<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $table = 'products';

    
    public function stock()
    {
        $products = Product::all();
        return view('stock')->withTitle('PELUKITAZ | STOCK')->with(['products' => $products]);
    }
    public function update(Request $request, Product $product)
    {
        $product->update(['existencia' => $request->existencia]);
    
        return redirect()->back()->with('success', 'Existencia actualizada.');
    }
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'sell_price' => 'required|numeric',
        'existencia' => 'required|numeric',
    ]);

    $product = Product::create($validatedData);
    return redirect()->route('products.index')->with('success', 'El producto ha sido agregado correctamente.');
    }

        
}

