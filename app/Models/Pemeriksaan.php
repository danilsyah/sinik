<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Pasien;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pemeriksaans';

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
}
