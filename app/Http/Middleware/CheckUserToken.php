<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckUserToken
{
    use GeneralTrait ;

    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }
    public function handle($request, Closure $next)
    {
        
        $user = null;
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->returnError('E3001','INVALID_TOKEN',403);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this->returnError('E3001','EXPIRED_TOKEN',400);
               
            } else {
                return $this->returnError('E3001','TOKEN_NOTFOUND',404);
            }
        } catch (\Throwable $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->returnError('E3001','INVALID_TOKEN',403);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this->returnError('E3001','EXPIRED_TOKEN',400);
            } else {
                return $this->returnError('E3001','TOKEN_NOTFOUND',404);
                
            }
        }

        if (!$user)
            $this->returnError('E3001','Unauthenticated');
        
        $userId = $user->id;
        $request->u_id = $userId ;
        return $next($request);
    }
}
