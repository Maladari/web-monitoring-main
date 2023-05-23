<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilais extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['date', 'time', 'tinggi_air', 'perubahan', 'humidity', 'pressure', 'rainfall', 'solar_radiation', 'temperature', 'wind_direction', 'wind_speed', 'battery', 'evaporation', 'ch_5min'];
    public function station()
    {
        return $this->hasOne(Stations::class);
    }
}
