<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'buses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'type',
        'vehicle_number'
    ];

    public function seats(){
        return $this-> hasMany(BusSeats::class);
    }
}
