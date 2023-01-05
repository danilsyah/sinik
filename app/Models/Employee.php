<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    // this field must type date yyyy-mm-dd HH:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    public function user(){
        return $this->hasMany(User::class, 'employee_id');
    }

    public function pemeriksaan(){
        return $this->hasMany(Pemeriksaan::class, 'employee_id');
    }
}
