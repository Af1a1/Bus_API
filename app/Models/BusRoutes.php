<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoutes extends Model
{
    use HasFactory;

    protected $table = 'bus_routes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'bus_id',
        'route_id',
        'status'
    ];
}
