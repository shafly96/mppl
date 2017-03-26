<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $table = "booking";
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = 'ID_Booking';
    protected $fillable = [
        'id_konsumen', 'waktu_booking', 'status_pengerjaan',
    ];
}
