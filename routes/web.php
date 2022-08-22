<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [EmployeController::class, 'index'])->name('employes');
Route::post('save-employe', [EmployeController::class, 'saveEmploye'])->name('save-employe');
Route::get('test-json', [EmployeController::class, 'testQueryJson'])->name('test-json');
Route::post('example-to-query', [EmployeController::class, 'exampleToQuery'])->name('example-to-query');
