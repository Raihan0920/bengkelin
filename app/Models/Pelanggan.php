<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pelanggan';
    protected $fillable = ['nama_pelanggan', 'no_ktp', 'alamat_pelanggan', 'motor_id'];

    public function detail_service(){
        return $this->hasMany(DetailService::class);
    }

    public function motor(){
        return $this->belongsTo(Motor::class, 'motor_id');
    }
}
