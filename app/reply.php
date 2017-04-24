<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    protected $table = "reply";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Reply';
    protected $fillable = [
        'ID_Konsultasi', 'ID_Konsumen', 'Isi_Balasan', 'Waktu Balas'
    ];
}
