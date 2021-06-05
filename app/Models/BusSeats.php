<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeats extends Model
{
    use HasFactory;

    protected $table = 'bus_seats';

    protected $primaryKey = 'id';

    protected $fillable = [

        'bus_id',
        'seat_number',
        'price'
    ];


    public function bus(){
        return $this->belongsToMany(Bus::class);
    }

}
