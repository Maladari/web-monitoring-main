<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function station()
    {
        return $this->belongsTo(Stations::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }
    public function dummy()
    {
        return $this->belongsTo(Dummys::class);
    }
}
