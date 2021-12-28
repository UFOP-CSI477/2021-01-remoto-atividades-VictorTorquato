<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ComponentController;
use Carbon\Carbon;

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
        $components = [];
        $now = Carbon::now();

        if ($cars_id !== null) {

            foreach ($cars_id as $id) {
                $car = Car::find($id);

                foreach ($car->components as $component) {
                    $c = $component;
                    $c->carName = $car->marca . ' ' . $car->modelo;
                    
                    if ($c->data_prox_rev != null)
                    {   
                        $data = $c->data_prox_rev;

                        if ($now->diffInDays(Carbon::parse($data), false) < 0 ) {
                            $c->priority = 0;
                            Session::flash('atraso', 'Há componente(s) com revisão em atraso, verifique-os!'); 
                            Session::flash('alert-class', 'alert-warning'); 
                        } else if ($now->diffInDays(Carbon::parse($data), false) <= 15 ) {
                            $c->priority = 1;
                        } else if ($now->diffInDays(Carbon::parse($data), false) <= 30 ) {
                            $c->priority = 2;
                        } else if ($now->diffInDays(Carbon::parse($data), false) <= 90 ) {
                            $c->priority = 3;
                        } else if ($now->diffInDays(Carbon::parse($data), false) > 90 ) {
                            $c->priority = 4;
                        }
                    } else {
                        if ($c->km_prox_rev - $car->km < 0) {
                            $c->priority = 0;
                            Session::flash('atraso', 'Há componente(s) com revisão em atraso, verifique-os!'); 
                            Session::flash('alert-class', 'alert-warning'); 
                        } else if ($c->km_prox_rev - $car->km <= 1000) {
                            $c->priority = 1;
                        } else if ($c->km_prox_rev - $car->km <= 2500) {
                            $c->priority = 2;
                        } else if ($c->km_prox_rev - $car->km <= 5000) {
                            $c->priority = 3;
                        } else if ($c->km_prox_rev - $car->km > 5000) {
                            $c->priority = 4;
                        } 
                    }
                    array_push($components, $c);
                }
            }
        }

        $comp = collect($components)->sortBy('data_prox_rev');
        $comp = collect($comp)->sortBy('km_prox_rev');
        $comp = collect($comp)->sortBy('priority');
        
        return view('indexLogged', ['components' => $comp]);
    } else {
        return view('index');
    }
    
})->name('home');

Route::post('/car/updateKm', function (Car $car) {
    if (Auth::check()) {

        $km = $_POST['km'];
        $car->km = $km;
        $car->km_update = Carbon::now();
        $car->update();

        return back();
    }
})->name('car.updateKm');

Route::get('/user/edit', function () {
    if (Auth::check()) {
        return view('user.edit');
    }
})->name('user.edit');

Route::post('/user/update', function () {
    if (Auth::check()) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $user = Auth::user();

        $user->name = $nome;
        $user->email = $email;

        $user->update();

        return redirect('user');
    }
})->name('user.update');

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
