<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = "transaksi";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Transaksi';
    protected $fillable = [
        'ID_Konsumen', 'ID_Pegawai', 'Total_Biaya', 'Waktu_Transaksi'
    ];
}
