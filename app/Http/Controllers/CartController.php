<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Special;
use Illuminate\Http\Request;
use App\Models\SalesInventory;

class CartController extends Controller
{
    public function shop()
    {
        $products = Special::all();
        return view('shop')->withTitle('PELUKITAZ | TIENDA')->with(['products' => $products]);
    }
    public function accesories()
    {
        $products = Special::where('category_id', 3)->get();
        return view('shop')->withTitle('PELUKITAZ | ACCESORIOS')->with(['products' => $products]);
        
    }
    public function candies()
    {
        $products = Special::where('category_id', 7)->get();
        return view('shop')->withTitle('PELUKITAZ | DULCES')->with(['products' => $products]);
    }
    public function hair()
    {
        $products = Special::where('category_id', 2)->get();
        return view('shop')->withTitle('PELUKITAZ | PRODUCTOS')->with(['products' => $products]);
    }

    public function spicy()
    {
        $products = Special::where('category_id', 4)->get();
        return view('shop')->withTitle('PELUKITAZ | PICOSOS')->with(['products' => $products]);
    }    

    public function choco()
    {
        $products = Special::where('category_id', 5)->get();
        return view('shop')->withTitle('PELUKITAZ | CHOCOLATES')->with(['products' => $products]);
    }    
    public function drinks()
    {
        $products = Special::where('category_id', 6)->get();
        return view('shop')->withTitle('PELUKITAZ | BEBIDAS')->with(['products' => $products]);
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
    
        \Cart::clear();
    
        return redirect()->route('checkout.confirmation');
    }    
}

