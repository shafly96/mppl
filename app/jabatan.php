<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = "jabatan_pegawai";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Jabatan';
    protected $fillable = [
        'nama_jabatan', 'gaji'
    ];
}
