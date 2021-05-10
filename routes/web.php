<?php

/*
 * No es apto para produccion, solo para practica
 * *************************************************
 * * (c) Migbert Yanez - migbertyanez@disroot.org  *
 * *************************************************
 * "La Verdad solo se puede encontrar en un lugar: El Codigo"
 */

use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('contacto', function () {
    $correo = new ContactoMailable();
    Mail::to('migbertyanez@disroot.org')->Send($correo);

    return 'Mensaje Enviado';
})->name('contacto');
