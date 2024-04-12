<?php

use App\Http\Controllers\Leader\Auth\RegisterController;
use App\Http\Controllers\Leader\Auth\LoginController;
use App\Http\Controllers\Leader\LeaderCommentController;
use App\Http\Controllers\Leader\PlayerController;
use App\Http\Controllers\Leader\PlayerGradeController;
use App\Http\Controllers\Leader\PlayerRankingController;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('create', [RegisterController::class, 'create'])->name('create');
Route::post('store', [RegisterController::class, 'store'])->name('store');

// ダッシュボード
Route::get('leader_home', fn() => view('leader.home'))->name('leader.home');
Route::get('leader_players', [PlayerController::class, 'leader_players'])->name('leader_players');
Route::get('players_notes_index/{user}', [PlayerController::class, 'players_notes_index'])->name('players_notes_index');
Route::get('players_note_detail/{id}', [PlayerController::class, 'players_note_detail'])->name('players_note_detail');

Route::get('players_grades_index/{user}', [PlayerGradeController::class, 'players_grades_index'])->name('players_grades_index');
Route::get('players_grades_show/{id}', [PlayerGradeController::class, 'players_grades_show'])->name('players_grades_show');

Route::get('players_batting_average', [PlayerRankingController::class, 'players_batting_average'])->name('players_batting_average');
Route::get('players_on_base_percentage', [PlayerRankingController::class, 'players_on_base_percentage'])->name('players_on_base_percentage');
Route::get('players_batting_point', [PlayerRankingController::class, 'players_batting_point'])->name('players_batting_point');
Route::get('players_practice_running', [PlayerRankingController::class, 'players_practice_running'])->name('players_practice_running');
Route::get('players_practice_swing', [PlayerRankingController::class, 'players_practice_swing'])->name('players_practice_swing');

Route::post('leader_notes_comment_store/{note}', [LeaderCommentController::class, 'store'])->name('leader_notes_comment_store');
Route::delete('leader_notes/{note}/comments/{comment}', [LeaderCommentController::class, 'destroy'])->name('leader_notes_comments_destroy');
