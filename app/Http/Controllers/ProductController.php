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
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->sell_price = $request->sell_price;
        $product->price = $request->price;
        $product->existencia = $request->existencia;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images');
            $product->image_path = $imagePath;
        }else {
            $product->image_path = '1.jpg'; // depormientras 
            $product->category_id = '7';

        }
        $product->save();

        return redirect('/stock')->with('success_msg', 'Producto creado exitosamente');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
    
        $product->delete();
    
        return redirect()->route('products.stock')->with('success', 'Producto eliminado');
    }
    
    
}
