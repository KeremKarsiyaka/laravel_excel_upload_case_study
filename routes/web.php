<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampainController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/discount_codes', [CampainController::class, 'list']);
Route::post('/import_discount_code', [CampainController::class, 'import_discount_code'])->name('import_discount_code');