<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class GovernorateController extends Controller
{

    use GeneralTrait ;
    public function getCountries()
    {
        $countries =  Governorate::where('status',1)->select('id','name_ar')->get();
        
        return $this->returnData('Countrey', $countries );
    }
}
