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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes_index');
    Route::get('/note_create', [App\Http\Controllers\NoteController::class, 'create'])->name('note_create');
    Route::post('/note_store', [App\Http\Controllers\NoteController::class, 'store'])->name('note_store');
    Route::get('/note_edit/{id}', [App\Http\Controllers\NoteController::class, 'edit'])->name('note_edit');
    Route::post('/note_update/{id}', [App\Http\Controllers\NoteController::class, 'update'])->name('note_update');
    Route::delete('/note_delete/{id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('note_delete');

});
