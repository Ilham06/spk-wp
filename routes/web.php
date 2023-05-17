<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AlternativeCriteriaController;
use App\Http\Controllers\CriteriaController;
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

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('alternative', AlternativeController::class);
Route::resource('criteria', CriteriaController::class);

Route::get('calculate', [AlternativeCriteriaController::class, 'index'])->name('calculate.index');
Route::get('calculate/edit/{id}', [AlternativeCriteriaController::class, 'edit'])->name('calculate.edit');
Route::patch('calculate/edit/{id}', [AlternativeCriteriaController::class, 'update'])->name('calculate.update');
Route::get('calculate/process', [AlternativeCriteriaController::class, 'process'])->name('calculate.process');
