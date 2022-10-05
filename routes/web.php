<?php

use App\Http\Controllers\File\FileController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Home\HomeController;
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



Route::get('/dashboard', [HomeController::class, 'Home'])
                ->middleware(['auth'])
                ->name('dashboard');               

Route::get('/manter_cursos', [CourseController::class, 'keepCourse'])
                ->middleware(['auth'])
                ->name('keep_course');

Route::get('/manter_categorias', [CategoryController::class, 'keepCategory'])
                ->middleware(['auth'])
                ->name('keep_category');

Route::get('/manter_arquivos', [FileController::class, 'keepFiles'])
                ->middleware(['auth'])
                ->name('keep_files');

Route::get('/manter_usuarios', [UserController::class, 'keepUser'])
                ->middleware(['auth'])
                ->name('keep_user');




require __DIR__.'/auth.php';
