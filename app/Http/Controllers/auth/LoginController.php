<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        /* 
        Validation
        */
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);


        /*
        Database Insert
        */
        if (Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/products');
        }
        //Auth::login($user);
else {
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

    
}
    }

    public function create()
    {
        return view('auth.login');
    }
}

?>
