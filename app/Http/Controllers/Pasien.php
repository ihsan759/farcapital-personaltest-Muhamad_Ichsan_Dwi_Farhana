<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\RiwayatUser;
use App\Models\User;
use Illuminate\Http\Request;

class Pasien extends Controller
{
    public function detail($id)
    {
        $user = User::query()->where('id', $id)->first();
        $pertanyaan = Pertanyaan::all();
        return view('Pasien.show', compact('user', 'pertanyaan'));
    }

    public function store(Request $request, $id)
    {
        foreach ($request->pertanyaan as $jawaban) {
            Jawaban::create([
                'id_user' => $id,
                'id_pertanyaan' => $jawaban,
                'status' => 1
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function save(Request $request, $id)
    {
        foreach ($request->pertanyaan as $jawaban) {
            RiwayatUser::create([
                'id_user' => $id,
                'id_riwayat' => $jawaban,
                'status' => 1
            ]);
        }

        return redirect()->route('dashboard');
    }
}
