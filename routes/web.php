<?php

use App\Http\Controllers\GroceryController as GroceryController;
use Illuminate\Support\Facades\DB;
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

Route::get ( "/test", function() {
    return view("test");
} );

Route::get('/css/{file}', function ($file) {
    $path = resource_path('css/' . $file);
    if (!file_exists($path)) {
        abort(404);
    }
    $content = file_get_contents($path);
    $type = mime_content_type($path);
    return response($content)->header('Content-Type', "text/css")->header("X-MIME", $type);
});

Route::get('/js/{file}', function ($file) {
    $path = resource_path('js/' . $file);
    if (!file_exists($path)) {
        abort(404);
    }
    $content = file_get_contents($path);
    $type = mime_content_type($path);
    return response($content)->header('Content-Type', "application/javascript")->header("X-MIME", $type);
});