<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

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
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard/visi/create', [DashboardController::class, 'createVisi'])->name('create.visi');
    Route::post('/dashboard/visi/create', [DashboardController::class, 'processVisi'])->name('process.visi');
    Route::get('/dashboard/visi/edit/{id}', [DashboardController::class, 'showEditVisi'])->name('show.edit.visi');
    Route::put('/dashboard/visi/{id}', [DashboardController::class, 'editVisi'])->name('edit.visi');
    Route::delete('/dashboard/visi/{id}', [DashboardController::class, 'deleteVisi'])->name('delete.visi');

    Route::get('/dashboard/misi/edit/{id}', [DashboardController::class, 'showEditMisi'])->name('show.edit.misi');
    Route::put('/dashboard/misi/{id}', [DashboardController::class, 'editMisi'])->name('edit.misi');
    Route::delete('/dashboard/misi/{id}', [DashboardController::class, 'deleteMisi'])->name('delete.misi');
    Route::post('/dashboard/sambutan', [DashboardController::class, 'processSambutan'])->name('process.sambutan');
    Route::put('/dashboard/sambutan', [DashboardController::class, 'processEditSambutan'])->name('process.edit.sambutan');

    Route::get('/dashboard/hero/create', [DashboardController::class, 'heroCreate'])->name('create.hero');
    Route::post('/dashboard/hero/create', [DashboardController::class, 'heroProcess'])->name('process.hero');
    Route::put('/dashboard/hero', [DashboardController::class, 'heroUpdate'])->name('update.hero');

    Route::get('/dashboard/menu/create', [DashboardController::class, 'menuCreate'])->name('create.menu');
    Route::post('/dashboard/menu/create', [DashboardController::class, 'menuProcess'])->name('process.menu');
    Route::get('/dashboard/menu/edit/{id}', [DashboardController::class, 'showEditMenu'])->name('show.edit.menu');
    Route::put('/dashboard/menu/{id}', [DashboardController::class, 'editMenu'])->name('edit.menu');
    Route::delete('/dashboard/menu/{id}', [DashboardController::class, 'deleteMenu'])->name('delete.menu');

    Route::get('/dashboard/about', [AboutController::class, 'adminIndex'])->name('admin.about');
    Route::get('/dashboard/about/create-story', [AboutController::class, 'createStory'])->name('create.story');
    Route::post('/dashboard/about/create-story', [AboutController::class, 'processStory'])->name('process.story');
    Route::put('/dashboard/about/story', [AboutController::class, 'processEditStory'])->name('update.story');

    Route::get('/dashboard/about/create-about', [AboutController::class, 'createAbout'])->name('create.about');
    Route::post('/dashboard/about/create-about', [AboutController::class, 'processAbout'])->name('process.about');
    Route::get('/dashboard/about/edit-about/{id}', [AboutController::class, 'showEditAbout'])->name('show.edit.about');
    Route::put('/dashboard/about/about', [AboutController::class, 'processEditAbout'])->name('update.about');
    Route::delete('/dashboard/about/about/{id}', [AboutController::class, 'deleteAbout'])->name('delete.about');

    Route::get('/dashboard/contact', [ContactController::class, 'adminIndex'])->name('admin.contact');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'processContact'])->name('process.contact');
Route::get('/faq',[FaqController::class,'index'])->name('faq');