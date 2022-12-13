<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailService extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'detail_service';
    protected $fillable = [
        'pelanggan_id',
        'service_id',
        'montir_id',
        'spare_part_id',
        'tanggal_service',
        'jam_masuk',
        'keluhan',
        'total_harga'
    ];
}
