<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buses';
    protected $fillable = [];
    

    public function chairsAvalaile()
    {
        return $this->hasMany(Chair::class, 'bus_id','id')->where('bus_chairs.status' ,'=',0);
    }
}
