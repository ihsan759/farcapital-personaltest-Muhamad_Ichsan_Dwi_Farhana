<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    public function detail($id)
    {
        $user = User::with('kondisi')->where('id', $id)->first();
        $tanggalAwal = Carbon::parse($user->tanggal_lahir);
        $tanggalAkhir = Carbon::parse(now());

        $selisih = $tanggalAwal->diffInYears($tanggalAkhir);

        return view('Pasien.show', compact('user', 'selisih'));
    }

    public function save(Request $request, $id)
    {
        if ($request->pertanyaan == null) {
            User::query()->where('id', $id)->update([
                'status' => 2
            ]);
        } else {
            User::query()->where('id', $id)->update([
                'status' => 1
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'berat_badan' => 'required',
            'temperature' => 'required',
            'sistole' => 'required',
            'diastole' => 'required',
            'denyut_nadi' => 'required',
            'hemoglobin' => 'required',
            'izin' => 'required'
        ]);

        $gender = User::query()->where('id', $id)->first();

        $status = 0;
        if ($request->berat_badan < 45) {
            $status += 1;
        }
        if ($request->temperature < 36.6 || $request->temperature > 37.5) {
            $status += 1;
        }

        if ($gender->jenis_kelamin == 1) {
            if ($request->hemoglobin < 12.5) {
                $status += 1;
            }
        } elseif ($gender->jenis_kelamin == 2) {
            if ($request->hemoglobin < 12.5) {
                $status += 1;
            }
        }

        if ($request->sistole >= 110 && $request->sistole <= 160 && $request->diastole >= 70 && $request->diastole <= 100) {
        } else {
            $status += 1;
        }

        if ($request->denyut_nadi < 50 || $request->denyut_nadi > 100) {
            $status += 1;
        }

        if ($request->izin == 2) {
            $status += 1;
        }

        Kondisi::query()->where('id_user', $id)->update([
            'izin' => $request->izin,
            'berat_badan' => $request->berat_badan,
            'temperature' => $request->temperature,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'denyut_nadi' => $request->denyut_nadi,
            'hemoglobin' => $request->hemoglobin
        ]);

        if ($status > 0) {
            User::query()->where('id', $id)->update([
                'status' => 4
            ]);
        } else {
            User::query()->where('id', $id)->update([
                'status' => 3
            ]);
        }

        return redirect()->route('dashboard');
    }
}
