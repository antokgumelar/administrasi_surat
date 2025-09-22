<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pemda extends Model
{
    use HasFactory;
    protected $table = 'instansi';
    protected $guard = [];
    protected $fillable = ['id','nama_instansi','alamat_instansi','telp_instansi','username_instansi','password_instansi','role'];
}
