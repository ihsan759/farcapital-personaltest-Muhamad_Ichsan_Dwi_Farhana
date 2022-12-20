<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use App\Models\User;
use Carbon\Carbon;
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
            'role' => 2
        ]);

        $tanggalAwal = Carbon::parse($request->post('tanggal_lahir'));
        $tanggalAkhir = Carbon::parse(now());

        $selisihTahun = $tanggalAwal->diffInYears($tanggalAkhir);

        $izin = 0;
        if ($selisihTahun > 17) {
            $izin = 1;
        } else {
            $izin = 0;
        }

        Kondisi::create([
            'izin' => $izin,
            'id_user' => $user->id
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
