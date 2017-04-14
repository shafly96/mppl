<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ktransaksi extends Model
{
    protected $table = 'keranjang_transaksi';
    protected $primaryKey = 'ID_Keranjang';
    public $timestamps = false;
    protected $fillable = array('Tipe_Transaksi', 'ID_Sparepart','ID_Servis','ID_Transaksi');
}
