<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/contacts', [ContactController::class, 'index']);


Route::get('/contact/{id}', [ContactController::class, 'getContactData']);

Route::post('/contact/{id}', [ContactController::class, 'updateContact']);

Route::get('/delete-contact/{id}', [ContactController::class, 'deleteContact']);

Route::get('/add-contact', [ContactController::class, 'addContact']);

//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
