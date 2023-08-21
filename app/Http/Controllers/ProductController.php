<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Special;
use App\Models\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $table = 'products';

    
    public function stock()
    {
        $products = Special::all();
        return view('stock')->withTitle('PELUKITAZ | STOCK')->with(['products' => $products]);
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
        $product->id_sucursal = $request->id_sucursal;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images');
            $product->image_path = $imagePath;
        }else {
            $product->image_path = '1.jpg'; // depormientras 
            $product->category_id = '7';

        }
        $images = $request->file('image_path')->store('public/images');

        $url = Storage::url($images);
        $product->save();

        File::create([
            'url' => $url
        ]);
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
    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->sell_price = $request->input('sell_price');
        $product->price = $request->input('price');

        $product->save();

        return redirect('/stock')->with('success', 'Producto actualizado correctamente.');
    }
    

    // public function editForm(Request $request, Product $product)
    // {
        //     $product = Product::findOrFail($product);
        
    //     $request->validate([
    //         'name' => 'required',
    //         'sell_price' => 'required|numeric',
    //         'price' => 'required|numeric',
    //     ]);
    
    //     $product->update([
    //         'name' => $request->name,
    //         'sell_price' => $request->sell_price,
    //         'price' => $request->price,
    //     ]);
    
    //     return redirect('/stock')->with('success', 'Producto actualizado exitosamente.');
    // }
    
    
    
}
