<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Village;

class Pasien extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pasiens';

    public function village(){
        return $this->belongsTo(Village::class);
    }
}
