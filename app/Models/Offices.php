<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function station()
    {
        return $this->HasMany(Stations::class);
    }
    public function users()
    {
        return $this->HasMany(User::class);
    }

}
