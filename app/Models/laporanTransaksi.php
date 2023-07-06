<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanTransaksi extends Model
{
    use HasFactory;
    protected $table='notes';
    public function User(){
        return $this->belongsTo(User::class,'Pembeli_id');
    }
}
