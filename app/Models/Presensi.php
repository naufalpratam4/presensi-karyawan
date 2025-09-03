<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = ['check_in', 'check_out', 'user_id', 'notes', 'status', 'tgl', 'latitude', 'longitude'];
    protected $table = 'presensis';
}
