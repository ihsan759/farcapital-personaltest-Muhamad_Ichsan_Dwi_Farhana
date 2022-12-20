<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = "kondisi";
    protected $guarded = ["id"];

    public function kondisi()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
