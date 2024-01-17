<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\leader\LeaderCommentController;
use App\Http\Controllers\Leader\LeaderLoginController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\Leader\LeaderRegisterController;
use App\Http\Controllers\leader\PlayerController;
use App\Http\Controllers\leader\PlayerGradeController;
use App\Http\Controllers\leader\PlayerRankingController;

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
    Route::put('/note_update/{id}', [NoteController::class, 'update'])->name('note_update');
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
    Route::get('/practice_swing', [RankingController::class, 'practice_swing'])->name('practice_swing');

    Route::post('/comment_store/{note}', [CommentController::class, 'store'])->name('comment_store');
    Route::delete('/notes/{note}/comments/{comment}', [CommentController::class, 'destroy'])->name('comment_destroy');

    });


     /*
|--------------------------------------------------------------------------
| 指導者用ルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'leader'], function () {
    // 登録
    Route::get('register', [LeaderRegisterController::class, 'create'])->name('leader.register');

    Route::post('register', [LeaderRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [LeaderLoginController::class, 'showLoginPage'])->name('leader.login');

    Route::post('login', [LeaderLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:leader'])->group(function () {
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

        Route::post('notes_comment_store/{note}', [LeaderCommentController::class, 'store'])->name('leader.comment_store');
    });

    // ログアウト
    Route::post('logout', [LeaderLoginController::class, 'logout'])->name('leader.logout');
});
