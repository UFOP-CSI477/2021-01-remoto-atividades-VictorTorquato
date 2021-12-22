<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;

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
    } else {
        $cars_id = [];
    }
    $cars = [];

    foreach ($cars_id as $id) {
        $car = Car::find($id);
        array_push($cars, $car);
    }

    return view('index', ['cars' => $cars]);
})->name('home');

Route::resource('/cars', Car::class);
Route::resource('/component', Component::class);

Auth::routes();
