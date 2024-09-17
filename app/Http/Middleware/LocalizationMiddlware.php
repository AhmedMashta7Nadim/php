<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\put;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Session::get('locale') !=null){
            App::setLocale(Session::get('locale'));
        }else{
                    Session::put('locale','en');
                  App::setLocale(Session::get('local'));
        }
   
        // if(session()->has('locale')){
        //     App::setLocale(session()->get('locale'));
        // }
        // if($request->hasHeader("Accept-language")){
        //     App::setLocale($request->header("Accept-language"));

        // }
        // if(Session::has('lang')){
        //     App::setLocale(Session::get('lang'));
       // }
        return $next($request);
      
    }
}
