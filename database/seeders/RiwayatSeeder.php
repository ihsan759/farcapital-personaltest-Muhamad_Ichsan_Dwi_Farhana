<?php

namespace Database\Seeders;

use App\Models\Riwayat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Riwayat::create([
            'nama' => 'dummy',
        ]);

        Riwayat::create([
            'nama' => 'Dalam jangka 6 bulan setelah kontak dengan penderita hepatitis',
        ]);
        Riwayat::create([
            'nama' => 'Dalam jangka 6 bulan setelah tato/tindik telinga',
        ]);
    }
}
