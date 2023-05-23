<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['nilai_id'];
    public function device()
    {
        return $this->hasOne(Devices::class);
    }
    public function office()
    {
        return $this->belongsTo(Offices::class);
    }
    public function nilai()
    {
        return $this->belongsTo(Nilais::class);
    }
}
