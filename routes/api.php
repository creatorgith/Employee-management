<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\controllers\EmployeController;
use App\http\controllers\API\DailyReportController;

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


Route::post('/demologin', [EmployeController::class,'login']);

// Route::middleware('auth:sanctum')->get('/user', function () {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum','isAdmin'], 'namespace' =>'Api'], function () { //'prefix' => 'api',		
    Route::get('/list', [EmployeController::class,'expense']);
    Route::post('/addexpense', [EmployeController::class,'storeexpense']);
    Route::post('/editexpense/{id}', [EmployeController::class,'editexpense']);
    Route::get('/dailyreport',[DailyReportController::class,'index']);


});
