<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertanyaan::create([
            'nama' => 'Usia 17-60 tahun (usia 17 tahun diperbolehkan bila mendapat surat izin orang tua)',
        ]);
        Pertanyaan::create([
            'nama' => 'Berat badan minimal 45 Kg',
        ]);
        Pertanyaan::create([
            'nama' => 'Temperature tubuh 36,6 - 37,5 derajat Celcius',
        ]);
        Pertanyaan::create([
            'nama' => 'Tekanan darah baik',
        ]);
        Pertanyaan::create([
            'nama' => 'Denyut nadi teratur',
        ]);
        Pertanyaan::create([
            'nama' => 'Hemoglobin memenuhi syarat minimum',
        ]);
    }
}
