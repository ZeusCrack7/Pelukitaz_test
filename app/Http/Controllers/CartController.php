<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SalesInventory;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('shop')->withTitle('PELUKITAZ | TIENDA')->with(['products' => $products]);
    }
    public function spicy()
    {
        $products = Product::where('category_id', 4)->get();
        return view('shop')->withTitle('PELUKITAZ | TIENDA')->with(['products' => $products]);
    }    

    public function choco()
    {
        $products = Product::where('category_id', 5)->get();
        return view('shop')->withTitle('PELUKITAZ | TIENDA')->with(['products' => $products]);
    }    
    public function drinks()
    {
        $products = Product::where('category_id', 6)->get();
        return view('shop')->withTitle('PELUKITAZ | TIENDA')->with(['products' => $products]);
    }    

    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('PELUKITAZ | CARRITO')->with(['cartCollection' => $cartCollection]);;
    }

    public function add(Request$request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,     
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Producto Agregado al Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Todos los Productos eliminados!');
    }

    public function clear_one(Request $request){
        \Cart::remove($request -> id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto eliminado!');
    }

    //ventas
    public function proceedToCheckout(Request $request)
{
    $quantitySold = \Cart::getTotalQuantity();

    SalesInventory::create([
        'quantity' => $quantitySold,
        'time' => now()
    ]);
    return redirect()->route('checkout.confirmation');
}

}

