<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];
    public $timestamps = false;

    protected $table = 'riwayat';

    public function riwayat()
    {
        return $this->hasMany(RiwayatUser::class, 'id_riwayat');
    }
}
