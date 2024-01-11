<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DistrictController;
use Illuminate\Support\Facades\Route;

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

Route::get('/customer', [CustomerController::class, 'create']);
Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/{division_id}/district', [DistrictController::class, 'getDistrictsByDivisionId']);
