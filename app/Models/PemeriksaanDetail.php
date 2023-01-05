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

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function pemeriksaan(){
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }

    public function obat(){
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }

    public function tindakan(){
        return $this->belongsTo(Tindakan::class, 'tindakan_id', 'id');
    }

    // public function getTotalHargaObat()
    // {
    //     return $this->obat->sum('harga');
    // }
}
