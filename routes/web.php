<?php

use App\Http\Controllers\filiereController;
use App\Http\Controllers\numberController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('importCsv' , [userController::class , 'importCsv'])->name('csv');
Route::get('insert', [userController::class , "addview"])->name('numb');
Route::get('index', [userController::class , "index"])->name('index');
Route::get('userpage', [userController::class , "userpage"])->name('userpage');
Route::get('/', [filiereController::class , "Acceuil"])->name('Acceuil');
Route::get('/list/{filiere}', [filiereController::class , "list"])->name('list');
Route::get('parr', [filiereController::class , "parrainer"])->name('parr');
Route::get('details', [filiereController::class , "details"])->name('details');











