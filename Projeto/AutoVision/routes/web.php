<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ComponentController;

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

    if (Auth::check()) {
        $cars_id = Auth::user()->cars;
        $cars = [];

        if ($cars_id !== null) {
            foreach ($cars_id as $id) {
                $car = Car::find($id);
                array_push($cars, $car);
            }
        }

        return view('indexLogged', ['cars' => $cars]);
    } else {
        return view('index');
    }
    
})->name('home');


Route::get('/user/edit', function () {
    if (Auth::check()) {
        return view('user.edit');
    }
})->name('user.edit');


Route::get('/user', function () {
    if (Auth::check()) {
        return view('user.show');
    }
})->name('user.show');


Route::get('/user/resetPassword', function () {

    return view('auth.passwords.email');

})->name('user.resetPass');


Route::delete('/user/delete', function () {
    Auth::user()->delete;
    return redirect('');
})->name('user.destroy');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('');
})->name('logout');

Route::resource('/car', CarController::class);
Route::resource('/component', ComponentController::class);

Auth::routes();
