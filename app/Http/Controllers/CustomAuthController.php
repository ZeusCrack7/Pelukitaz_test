<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  

    public function customLogin(Request $request)
    {
        //dd($request);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/shop')
                        ->withSuccess('Sesión iniciada');
        }
        else {
            dd("Hola");
        }
        
        return redirect("login")->withSuccess('Te faltó: 123');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'username' => 'required|unique:usuarios',
            'password' => 'required|min:4',
        ]);
        
        $data = $request->all();
        $check = $this->create($data);
        
        return redirect("/shop")->withSuccess('Has iniciado sesión');
    }

    public function create(array $data)
    {
        return User::create([
        'username' => $data['username'],
        'password' => Hash::make($data['password'])
        ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('/shop');
        }
        
        return redirect("login")->withSuccess('Access denegado');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
        
        return Redirect('login');
    }
}