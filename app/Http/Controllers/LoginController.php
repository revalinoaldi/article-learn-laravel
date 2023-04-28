<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login'
        ]);
    }

    public function authentication(Request $req)
    {
        $valid = $req->validate([
            // 'email' => 'required|min:5|email:dns',
            'email' => 'required|min:5',
            'pwd' => 'required|min:5'
        ]);

        if (Auth::attempt([
            'email' => $valid['email'], 
            'password' => $valid['pwd']
        ])) {
            $req->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('notif', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error Login!</strong> Email or Password incorrect, please try again!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
    }

    // Register

    public function register()
    {
        return view('login.register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:100',
            'uname' => 'required|min:4|max:50|unique:users,username',
            'email' => 'required|email:dns|unique:users',
            'pwd' => 'required|min:5',
        ]);

        $is_success = User::create([
            'name' => $validate['name'],
            'username' => $validate['uname'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['pwd'])
        ]);

        if ($is_success) {
            return redirect('/login')->with('notif','
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfull!</strong> Registration Successfull, you can login right now!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }else{
            return redirect('/register')->with('notif','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Registration Unsuccessfull, please try again!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }
        // return $request->all();
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
