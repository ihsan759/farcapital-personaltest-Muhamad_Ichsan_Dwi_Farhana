<?php

namespace App\Http\Controllers;

use App\Models\RiwayatUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentikasi extends Controller
{
    public function index()
    {
        return view('Auth.index');
    }

    public function create()
    {
        return view('Auth.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);


        $user = User::create([
            'nama' => $request->post('nama'),
            'jenis_kelamin' => $request->post('gender'),
            'tanggal_lahir' => $request->post('tanggal_lahir'),
            'alamat' => $request->post('alamat'),
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'status' => 'Pendonor'
        ]);

        RiwayatUser::create([
            'id_user' => $user->id,
            'id_riwayat' => 1,
            'status' => 1
        ]);

        return redirect()->route('login');
    }


    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah',
        ])->onlyInput('email', 'password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
