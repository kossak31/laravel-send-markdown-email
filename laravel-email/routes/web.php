<?php


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

Route::get('/contact', [\App\Http\Controllers\WebsiteController::class, 'contact_form'])->name('form.contact');
Route::post('/contact', [\App\Http\Controllers\WebsiteController::class, 'contact_form_post'])->name('form.contact.post');
