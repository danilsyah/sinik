<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id','username', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // inverse one to Many ke table roles
    public function role(){
        return $this->belongsTo(Role::class, 'role_id','id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function punyaRule($nama_rule){
        if($this->role->nama_rule == $nama_rule){
            return true;
        }
        return false;
    }
}
