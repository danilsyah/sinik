<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PemeriksaanDetail;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $guarded = [];


    public function pemeriksaanDetail(){
        return $this->hasMany(PemeriksaanDetail::class);
    }

    public function totalHarga() {
        return $this->sum('harga');
    }

}
