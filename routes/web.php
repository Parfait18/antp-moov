<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiareController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    
Route::get('/', function () {
    return view('acceuil');
});

// Route::get('/forms', function () {
//     return view('frontend.forms.antpforms');
// })->name('formsantp');

Route::get('/returnurl', function () {
    return view('frontend.forms.returnurl');
})->name('returnurl');

Route::get('/msisdn', function () {
    return view('frontend.forms.antpmsisdn');
})->name('msisdn');


Route::post('/sendmsisdn', [BeneficiareController::class, 'send_msisdn'])->name('sendmsisdn');
Route::get('/forms/{code}', [BeneficiareController::class, 'verif_numero'])->name('formsantp');

Route::post('registration', [BeneficiareController::class, 'customRegistration'])->name('custumregister');

Route::middleware(['basicAuth'])->group(function () {
    //All the routes are placed in here
   Route::get('/importdata', [ImportController::class, 'importExportView'])->name('importdata');
Route::post('/import', [ImportController::class, 'import'])->name('import');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[AdminController::class, 'index'])->name('admindashboard');
    Route::get('/getdata',[AdminController::class, 'getdata'])->name('getdata');
    Route::get('/exportExcel',[AdminController::class, 'exportExcel'])->name('exportexcel');
    Route::get('/exportPdf',[AdminController::class, 'exportPdf'])->name('exportpdf');
});

Auth::routes();