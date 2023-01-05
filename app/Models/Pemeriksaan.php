<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Pasien;
use App\Models\PemeriksaanDetail;


class Pemeriksaan extends Model
{
    use HasFactory;

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    protected $table = 'pemeriksaans';

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function pemeriksaan_detail(){
        return $this->hasMany(PemeriksaanDetail::class, 'pemeriksaan_id');
    }
}
