<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemeriksaan;
use App\Models\Obat;
use App\Models\Tindakan;

class PemeriksaanDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pemeriksaan_details';

    public function pemeriksaan(){
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function obat(){
        return $this->belongsTo(Obat::class);
    }

    public function tindakan(){
        return $this->belongsTo(Tindakan::class);
    }
}
