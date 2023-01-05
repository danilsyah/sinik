<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Village;
use App\Models\Pemeriksaan;

class Pasien extends Model
{
    use HasFactory;

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    protected $table = 'pasiens';

    public function pemeriksaan(){
        return $this->hasMany(Pemeriksaan::class, 'pasien_id');
    }

    public function village(){
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }
}
