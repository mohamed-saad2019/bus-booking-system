<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class checkPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    use GeneralTrait ;
    
    public function handle(Request $request, Closure $next)
    {
        $secret = $request->header('apiSecret');
        if(!isset($secret))
            return $this->returnError('E3000','Enter apiSecret ',403 );
        
        if( $secret !== env('API_SECRET','d54fdk!d5&m'))
            return $this->returnError('E3000',' apiSecret not correct.',403 );
            
        return $next($request);
    }
}
