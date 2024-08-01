<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as AdminProjectsController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(function(){
    Route::get('projects/deleted', [AdminProjectsController::class, 'deleted'])->name('projects.deleted');
    Route::patch('projects/{project}/restore', [AdminProjectsController::class, 'restore'])->name('project.restore');
    Route::delete('projects/{project}/permdelete', [AdminProjectsController::class, 'permdelete'])->name('project.permdelete');
    Route::resource("projects",AdminProjectsController::class);
});
