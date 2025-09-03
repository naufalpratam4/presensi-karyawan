<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['user_id', 'no_hp', 'status', 'posisi'];
    protected $table = 'karyawans';
}
