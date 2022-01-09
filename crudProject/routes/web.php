<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;

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
//     return view('main');
// });

Route::get('/main', [pagesController::class, 'getPost'])->name(
    'crudpost.getPost'
);

Route::get('delete/{id}', [pagesController::class, 'deletePost'])->name(
    'crudpost.deletePost'
);

Route::post('/post', [pagesController::class, 'insrtPost'])->name(
    'crudpost.insrtPost'
);
