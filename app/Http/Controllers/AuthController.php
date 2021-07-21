<?php

namespace App\Http\Controllers;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use DB ;

class AuthController extends Controller
{
    use GeneralTrait ;

    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    function login( Request $request){
        
        try {
            $rules = [
                "mobile"    => "required|digits:11|numeric",
                "password"  => "required" ,
            ];
            $validator = Validator::make($request->all(), $rules );
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            
            //login

            $token =  Auth::guard('api')->attempt(['phone' => $request->mobile , 'password' => $request->password ]);

            if(!$token)
               return $this->returnError('E001',__('api.logindatanotcorrect'));

            $user = Auth::guard('api')->user();
            $user -> api_token = $token;
            unset($user->email_verified_at);
            unset($user->password);
            unset($user->remember_token);
            unset($user->created_at );
            unset($user->updated_at );
            return $this -> returnData('user' , $user  , __('api.successlogin') , 200);

        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

}
