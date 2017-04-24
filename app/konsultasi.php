<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    protected $table = "konsultasi";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Konsultasi';
    protected $fillable = [
        'judul', 'deskripsi_konsultasi', 'waktu_buat'
    ];
}
