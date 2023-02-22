<?php

use App\Http\Controllers\GroceryController as GroceryController;
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

Route::get   ( "/groceries",              [ GroceryController::class, "index" ] )   -> name ("groceries.index");
Route::get   ( "/groceries/create",       [ GroceryController::class, "create" ] )  -> name ("groceries.create");
Route::post  ( "/groceries",              [ GroceryController::class, "store" ] )   -> name ("groceries.store");
Route::post  ( "/grocery/{grocery}/edit", [ GroceryController::class, "edit" ] )    -> name ("groceries.edit");
Route::put   ( "/grocery/{grocery}",      [ GroceryController::class, "update" ] )  -> name ("groceries.update");
Route::patch ( "/grocery/{grocery}",      [ GroceryController::class, "update" ] )  -> name ("groceries.update");
Route::delete( "/grocery/{grocery}",      [ GroceryController::class, "destroy" ] ) -> name ("groceries.destroy");

Route::redirect("/", "/groceries");