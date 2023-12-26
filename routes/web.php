<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\RankingController;


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

    Route::get('/grades', [GradeController::class, 'index'])->name('grades_index');
    Route::get('/grade_create', [GradeController::class, 'create'])->name('grade_create');
    Route::post('/grade_store', [GradeController::class, 'store'])->name('grade_store');
    Route::get('/grade_edit/{id}', [GradeController::class, 'edit'])->name('grade_edit');
    Route::post('/grade_update/{id}', [GradeController::class, 'update'])->name('grade_update');
    Route::delete('/grade_delete/{id}', [GradeController::class, 'destroy'])->name('grade_delete');
    Route::get('/grade_show/{id}', [GradeController::class, 'show'])->name('grade_show');

    Route::get('/batting_average', [RankingController::class, 'batting_average'])->name('batting_average');
    Route::get('/on_base_percentage', [RankingController::class, 'on_base_percentage'])->name('on_base_percentage');
    Route::get('/batting_point', [RankingController::class, 'batting_point'])->name('batting_point');

    Route::get('/practice_running', [RankingController::class, 'practice_running'])->name('practice_running');

    });
