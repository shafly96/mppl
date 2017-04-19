<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = "pegawai";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Pegawai';
    protected $fillable = [
        'ID_Jabatan','nama_pegawai', 'no_telp_pegawai', 'alamat_pegawai'
    ];
}
