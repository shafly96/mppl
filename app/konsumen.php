<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsumen extends Model
{
    protected $table = "konsumen";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Konsumen';
    protected $fillable = [
        'nama_konsumen', 'no_telp_konsumen', 'alamat_konsumen'
    ];
}
