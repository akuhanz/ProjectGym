<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    // membuat pengguna( Admin dan User) menuju kehalaman Login
    public function index(){
        return view('auth.login');
    }

    // Proses agar pengguna( Admin dan User) bisa login sesuai dengan email dan password yang sudah ia buat di halaman register
    public function login_proses(Request $request){
         // Validasi data permintaan
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $email = $request->email;
            $password = $request->password;

            // Periksa apakah email ada di database
            $user = User::where('email', $email)->first();

        if ($user) {
            // Jika emailnya ada, periksa kata sandinya
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                session(['authenticated' => true]);
    
                // Pengalihan berdasarkan Role pengguna
                if (Auth::user()->role == 'user') {
                    return redirect('dashboard');
                } elseif (Auth::user()->role == 'admin') {
                    return redirect('dashboardadmin');
                }
            } else {
                // Jika kata sandi salah
                return redirect()->route('login')->withErrors([
                    'password' => 'Password anda salah',
                ])->withInput();
            }
        } else {
            // Jika email tidak ada, tampilkan kesalahan email dan kata sandi
            return redirect()->route('login')->withErrors([
                'email' => 'Email anda salah',
                'password' => 'Password anda salah',
            ])->withInput();
        }
    }

    // membuat pengguna menuju kehalaman Register agar bisa membuat akunnya
    public function register(){
        return view('auth.register');
    }

    // Proses agar pengguna membuat Akun sebelum dia login
    public function register_proses(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6'
        ]);

        $idUsers = Helper::IDGenerator(new User, 'idUsers', 4,'Hoyo');

        $data['idUsers']        = $idUsers;
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

    // Proses agar Pengguna bisa logout ketika ingin keluar dari akunnya
    public function logout(){
        Auth::logout();
        session()->forget('authenticated');
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }

}
