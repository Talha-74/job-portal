<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDetailController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/job', [JobController::class, 'create'])->name('job.create');
Route::post('/store/job', [JobController::class, 'store'])->name('job.store');

Route::get('/job-detail/{job}', [JobDetailController::class, 'show'])->name('job.detail');
Route::post('/save-job', [JobController::class, 'saveJob'])->name('save.job');

Route::post('/apply/job/', [JobController::class, 'ApplyJob'])->name('apply.job');

Route::get('category/jobs/{name}', [JobDetailController::class, 'singleCategoryJobs'])->name('category.job');

