<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PemeriksaanDetail;

class Tindakan extends Model
{
    use HasFactory;

    protected $table = 'tindakans';

    protected $guarded = [];

    public function pemeriksaanDetail(){
        return $this->hasMany(PemeriksaanDetail::class);
    }
}
