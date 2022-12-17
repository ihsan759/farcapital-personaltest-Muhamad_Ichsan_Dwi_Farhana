<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    function index()
    {
        $users = User::withCount('riwayat_user', 'jawaban')->get();
        return view('Dashboard.index', compact('users'));
    }

    function pertanyaan()
    {
        $pertanyaan = Riwayat::all();
        return view('Pertanyaan.index', compact('pertanyaan'));
    }
}
