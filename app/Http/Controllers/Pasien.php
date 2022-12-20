<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\RiwayatUser;
use App\Models\User;
use Illuminate\Http\Request;

class Pasien extends Controller
{


    public function store(Request $request, $id)
    {
        if (count($request->pertanyaan) == 1) {
            foreach ($request->pertanyaan as $jawaban) {
                Jawaban::create([
                    'id_user' => $id,
                    'id_pertanyaan' => $jawaban,
                    'status' => 1
                ]);
            }
        } else {
            Jawaban::create([
                'id_user' => $id,
                'id_pertanyaan' => 7,
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
