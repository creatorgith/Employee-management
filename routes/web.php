<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\http\controllers\EmployeController;
use App\http\controllers\SkillController;
use App\http\controllers\HomeController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PDFController;

Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);



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

Route::get('/',function(){
    return view('welcome');
});
Route::get('/locationuser', [App\Http\Controllers\LocationTestController::class, 'user'])->name('user');

// Route::get('/blog', function () {
//     return view('blog');
// });
Route::get('blog',[StudentController::class,'create']);
Route::post('/blog/add',[StudentController::class,'store']);
Route::get('/index',[StudentController::class,'index']);
Route::get('/blog/edit/{id}',[StudentController::class,'edit']);
Route::post('/blog/update/{id}',[StudentController::class,'update']);
Route::get('/delete/{id}',[StudentController::class,'delete']);
// Route::post('/fetchstate', [StudentController::class, 'fetchState']);s
Route::get('/get-states/{country_id}', [StudentController::class, 'getStates']);





// Route::get('/employe',function(){
//     return view('employe');
// });

Route::middleware('auth','isAdmin')->group(function(){

    Route::view('/indexemployee',[EmployeController::class,'index']);
Route::get('employe',[EmployeController::class,'create'])->name('employe');
Route::post('/employe/add',[EmployeController::class,'store']);
Route::get('/indexemployee',[EmployeController::class,'index']);
Route::get('/deletes/{id}',[EmployeController::class,'delete']);
Route::get('/employe/edit/{id}',[EmployeController::class,'edit']);
Route::post('/employe/update/{id}',[EmployeController::class,'update']);
Route::get('/employe/show/{id}',[EmployeController::class,'show']);
Route::get('/employe/salary/{id}',[EmployeController::class,'salary']);
Route::post('/employe/addsalary/{id}',[EmployeController::class,'addsalary']);
Route::get('/indexsalary',[EmployeController::class,'salaryindex']);
Route::get('/export', [EmployeController::class,'export']);
Route::get('/indexnotification',[EmployeController::class,'notify']);


Route::get('/send', [EmployeController::class, 'send']);
Route::post('/import', [EmployeController::class, 'import']);
// Route::get('/import', function () {
//     return 'POST request received at /import route';
// });
// Route::get('/employe', function () {
//     // Logic for displaying the admin dashboard
//     return view('employe');
// })->middleware('auth')->name('employe');

Route::get('/employe/skill/{id}',[SkillController::class,'create']);
Route::post('/employe/addskill/{id}',[SkillController::class,'store']);
Route::get('/indexskill',[SkillController::class,'index']);
Route::get('/deleteskill/{id}',[skillController::class,'delete']);
Route::get('/indexskill/edit/{id}',[SkillController::class,'edit']);
Route::post('/indexskill/update/{id}',[SkillController::class,'update']);
Route::get('/indexskill/show/{id}',[SkillController::class,'show']);

});

Route::get('/home',[HomeController::class,'index']);
Route::get('/employe/salaryrecord/{id}',[EmployeController::class,'salaryrecord']);
Route::get('/mylive',function(){
    return view('mylive');
});
Route::get('editlive',function(){
    return view('editlive');
});
Route::get('/viewsalary',[HomeController::class,'salary']);


Route::middleware(['auth', 'isUser'])->group(function () {
    // Routes for users
    Route::get('/viewsalary',[HomeController::class,'salary']);
});

Auth::routes([]);

Route::get('/mychart',function(){
    return view('mychart');
});