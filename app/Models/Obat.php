<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PemeriksaanDetail;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];


    public function pemeriksaanDetail(){
        return $this->hasMany(PemeriksaanDetail::class, 'obat_id');
    }

    public function totalHarga() {
        return $this->sum('harga');
    }

}
