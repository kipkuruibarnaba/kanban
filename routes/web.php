<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColumnController;

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
    return view('welcome');
});


Route::post('/load_items', [ColumnController::class, 'getColumns']);
Route::post('/add_column_url', [ColumnController::class, 'store']);
Route::post('/add_card_url', [ColumnController::class, 'storecard']);
Route::post('/edit_card_url', [ColumnController::class, 'edit']);
Route::delete('/remove_column_url/{id}', [ColumnController::class, 'removecolumn']);