<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TecnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
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

// Route Guest (pubblica)
Route::get('/',[PageController::class,'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function(){
            Route::get('/',[DashboardController::class,'index'])->name('home');
            Route::resource('tecnology', TecnologyController::class);
            Route::resource('type', TypeController::class);
            Route::resource('project', ProjectController::class);
            Route::get('project/{project}/delete-image',[ProjectController::class,'destroy_image'])->name('project.delete-image');
            Route::get('projects/tecnology/{tecnology}',[TecnologyController::class,'projectTecnology'])->name('tecnology.projects-tecnology');
        });

require __DIR__.'/auth.php';
