<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;

class Instansi extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'instansi';
    protected $guarded = [];
    protected $fillable = ['id','nama_instansi','alamat_instansi','telp_instansi','username_instansi','password_instansi','role'];
}
