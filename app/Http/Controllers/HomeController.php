<?php

namespace App\Http\Controllers;

use App\Models\Special;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('shop');
    }
    public function shop()
    {
        $products = Special::all();
        return view('shop')->withTitle('PELUKITAZ | TIENDA')->with(['products' => $products]);
    }

}
