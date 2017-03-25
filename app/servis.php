<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servis extends Model
{
    protected $table = "servis";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Servis';
    protected $fillable = [
        'deskripsi_servis', 'harga_servis',
    ];
}
