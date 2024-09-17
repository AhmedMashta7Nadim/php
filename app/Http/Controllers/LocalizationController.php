<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class LocalizationController extends Controller
{
    public function setLang($lang){
        //    App::setLocale($locale);
           session::put('lang',$lang);
           return redirect()->back();
    }
}

