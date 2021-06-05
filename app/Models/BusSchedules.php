<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSchedules extends Model
{
    use HasFactory;

    protected $table = 'bus_schedules';

    protected $primaryKey = 'id';

    protected $fillable = [
        'bus_route_id',
        'direction',
        'start_timestamp',
        'end_timestamp'
    ];
}
