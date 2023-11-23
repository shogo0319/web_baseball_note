<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GradeController;

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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/notes', [NoteController::class, 'index'])->name('notes_index');
    Route::get('/note_create', [NoteController::class, 'create'])->name('note_create');
    Route::post('/note_store', [NoteController::class, 'store'])->name('note_store');
    Route::get('/note_edit/{id}', [NoteController::class, 'edit'])->name('note_edit');
    Route::post('/note_update/{id}', [NoteController::class, 'update'])->name('note_update');
    Route::delete('/note_delete/{id}', [NoteController::class, 'destroy'])->name('note_delete');
    Route::get('/note_detail/{id}', [NoteController::class, 'detail'])->name('note_detail');
    Route::get('/grade/create', [GradeController::class, 'create'])->name('grade_create');
    Route::post('/grade_store', [GradeController::class, 'store'])->name('grade_store');
    });
