<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $table = 'trips';
    protected $guarded = [];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'trip_id','id');
    }

    public function stations()
    {
        return $this->hasMany(Station::class, 'trip_id','id')->select('id','trip_id','from_gov','to_gov','numOfBookings')->where('numOfBookings','<','12');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id')->select('id','licence_num','bus_num');
    }

    public function scopeAvailable($query)
    {
        return $query->with('bus.chairsAvalaile');
    }

    public function scopeStation($query,$arg)
    {
        return $query->with('stations')->whereHas('stations' , function($_query)use($arg){
            return $_query->where('from_gov','=',$arg->from)->where('to_gov','=',$arg->to) ;
        } );
    }
    
}
