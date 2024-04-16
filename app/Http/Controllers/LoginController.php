<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function admin(){
        return view('auth.admin');
    }
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

       if( Auth::attempt($data)){
        session(['authenticated' => true]);
        if (Auth::user()->role == 'user'){
            return redirect('dashboard');
        }elseif(Auth::user()->role == 'admin'){
            return redirect('dashboardadmin');
        }
       }else{
        return redirect()->route('login')->with('failed', 'Email atau Password anda salah');
       }
       
    }

    public function logout(){
        Auth::logout();
        session()->forget('authenticated');
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6'
        ]);

        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['password']       = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

       if( Auth::attempt($login)){
        session(['authenticated' => true]);
            return redirect()->route('dashboard');
       }
    }

}
