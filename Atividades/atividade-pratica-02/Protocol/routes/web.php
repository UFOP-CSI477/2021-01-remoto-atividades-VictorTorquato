<?php

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

use App\Models\Subject;
use App\Models\Requests;
use App\Models\User;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;

Route::get('/home', function () {

    $users = User::orderBy('name')->get();
    $subjects = Subject::orderBy('name')->get();
    $requests = Requests::orderBy('date')->get();
    
    if (Auth::check()) {
        return view('admin.index', ['requests' => $requests, 'subjects' => $subjects, 'users' => $users]); 
    } else {
        return view('index', ['requests' => $requests, 'subjects' => $subjects, 'users' => $users]); 
    }
})->name('home');

Route::get('/logout', [UserController::class, 'handleLogout'])->name('logout');

Route::resource('/user', UserController::class);
Route::resource('/subject', SubjectController::class);
Route::resource('/request', RequestController::class);

Auth::routes();

