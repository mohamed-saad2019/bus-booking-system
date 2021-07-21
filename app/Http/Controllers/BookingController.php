<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Chair;
use App\Models\Station;
use App\Models\Trip;
use App\Traits\GeneralTrait;
use DB;
use Validator ;

class BookingController extends Controller
{
    use GeneralTrait ;
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }
    public function index(Request $request)
    {
        $rules = [
            'from'    => 'required|numeric|exists:governorates,id',
            'to'      => 'required|numeric|exists:governorates,id'
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        try{
            $list = Trip::station($request)
                        ->available()
                        ->select('id','name','take_off_time','distance','expected_time','bus_id')
                        ->where('status',0)
                        ->get();
            return $this->returnData('data', $list );
        }catch (\Exception $ex){
            DB::rollback();
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }


    
    public function TicketBooking(Request $request)
    {
        try{

            $rules = [
                'trip_id'       => 'required|numeric|exists:trips,id',
                'chairs.*'      => 'required|numeric|exists:bus_chairs,id',
                'station_id'    => 'required|numeric|exists:trip_stations,id',
            ];
            
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            $trip       = Trip::findOrFail($request->trip_id);
            $station    = Station::findOrFail($request->station_id);

            foreach($request->chairs as $chair)
            {
                $_chair = Chair::findOrFail($chair);

                if($_chair->status == 'available')
                {
                    $_chair->status = 1 ;
                    $_chair->save();
                }else{
                    return $this->returnError('200', "Sorry, this chair is already booked",200 );
                }

                Booking::create([
                    'from_gov'  => $station->from_gov   ,
                    'to_gov'    => $station->to_gov     ,
                    'trip_id'   => $trip->id            ,
                    'chair_id'  => $chair               ,
                    'status'    => 1                    
                ]);
                
            }

            $station->numOfBookings = $station->numOfBookings + count($request->chairs) ;
            $station->save();

            $list['trip_id']        = $trip->id ;
            $list['trip_name']      = $trip->name ;
            $list['take_off_time']  = $trip->take_off_time ;
            $list['chair_id']       = implode(" | ",$request->chairs) ;
            $data                   = collect($list) ;
            return $this->returnData('data', $data ,"Successfully booked",200 );

        }catch (\Exception $ex){
            DB::rollback();
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
