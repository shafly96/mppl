<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sparepart extends Model
{
    protected $table = 'sparepart';
    protected $primaryKey = 'ID_Sparepart';
    public $timestamps = false;
    protected $fillable = array('Nama_Sparepart', 'Kendaraan_Sparepart','Harga_Sparepart','Stok_Sparepart');
}
