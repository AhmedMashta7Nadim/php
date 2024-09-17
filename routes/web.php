<?php
use Illuminate\Support\Facades\App;
use App\Http\Controllers\OfficarController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrenciesController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\RemittancesController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LocalizationMiddlware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/off/{lang}',function($locale='fr'){
//     App::setLocale($locale);
//  return view('Officer.indexOff');
// });
// Route::get('/off',[OfficarController::class,'update']);
Route::resource('off',OfficarController::class);
//Route::get('/off', [OfficarController::class,'index'])->name('off.index');
Route::get('/off/adit/{id}', [OfficarController::class,'edit'])->name('off.edit');
Route::delete('/off/deleta/{id}', [OfficarController::class,'destroy'])->name('off.delete');
Route::put('/off/update/{id}', [OfficarController::class,'update'])->name('off.update');



Route::get('/', [RemittancesController::class,'index'])->name('index');


Route::resource('reim',RemittancesController::class);
Route::resource('curr',CurrenciesController::class);
// http://127.0.0.1:8000/register
Route::get('/register',function(){
    return view('Authentication.register');
});


Route::post('/register',[AuthController::class,'register'])->name('registeruser');

//http://127.0.0.1:8000/login
Route::get('/login',function(){
    return view('Authentication.login');


});

Route::post('/login',[AuthController::class,'login'])->name('loginuser');



Route::post('/logout',function(){
   Auth::logout();
    return redirect('/register');
})->name('logout');


//  Route::get('off/lang/{lang}', [LocalizationController::class, 'setLang']);

Route::get('LocalizationMiddleware/{locale}', function($locale) {
    if (in_array($locale, ['ar', 'en', 'fr'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('locale');

