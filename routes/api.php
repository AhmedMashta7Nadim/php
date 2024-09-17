<?php

use App\Http\Controllers\Api\OfficarController;
use App\Http\Controllers\Api\RemittancesController;
use App\Http\Controllers\OfficarController as ControllersOfficarController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/offapi',OfficarController::class);
Route::get('/offapi/{id}', [OfficarController::class, 'show']);
//راوت من نوع apiيقوم بعملية جلب بيانات المكاتب

Route::apiResource('/remapi',RemittancesController::class);
Route::get('/remapi/{id}', [RemittancesController::class, 'show']);
//روت من نوع api يقوم بجلب بيانات الحوالات
Route::middleware('auth:sanctum')->group(function(){
 Route::get('/have-middleware',function(){
    return 'you';
 });
});

Route::get('/generate-token',function(){
   $user=User::first();
   return $user->createToken('token')->plainTextToken;
});

Route::get('/generate-api-token/{id}',function($id){
 $user=User::findOrFail($id);
 if(!$user->api_token){
     $user->api_token=Str::random(60);
     $user->save();
 }
 return $user->api_token;
});
