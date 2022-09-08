<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


//Route::get('{any}', [ContactController::class, 'showContacts'])->where('any', '.*');


Route::get('/', [ContactController::class, 'showContacts']);
