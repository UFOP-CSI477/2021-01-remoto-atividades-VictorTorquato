<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\VacinaController;
use App\Models\Registro;
use App\Models\Vacina;
use App\Models\Unidade;

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
        return view('indexLogged'); 
    } else {
        return view('index'); 
    }
})->name('home');

Route::get('/info', function () {
    $registros = Registro::all();
    $vacinas_list = Vacina::all();
    $vacinas = [];

    foreach ($vacinas_list as $v) {
        array_push($vacinas, (object) ['id' => $v->id, 'nome' => $v->nome, 'total' => 0]);
    }

    $dose_unica = 0;
    $primeira_dose = 0;
    $segunda_dose = 0;
    $total = 0;

    foreach ($registros as $r) {

        if ($r->vacina->dose == 1) {
            $dose_unica = $dose_unica + 1;
        } else if ($r->dose == 1) {
            $primeira_dose = $primeira_dose + 1;
        } else if ($r->dose == 2) {
            $segunda_dose = $segunda_dose + 1;
        }

        foreach ($vacinas as $v) {
            if($r->vacina_id == $v->id) {
                $v->total = $v->total + 1;
            }
        }
        $total = $total + 1;
    }

    $doses = (object) [
        'dose_unica' => $dose_unica, 
        'primeira_dose' => $primeira_dose, 
        'segunda_dose' => $segunda_dose
    ];

    if (Auth::check()) {
        return view('infoLogged', ['doses' => $doses, 'vacinas' => $vacinas]); 
    } else {
        return view('info', ['doses' => $doses, 'vacinas' => $vacinas]); 
    }
})->name('info');

Route::get('/admin', function () {
    if (Auth::check()) {
        return view('admin'); 
    }
})->name('admin');

Route::post('/buscaUnidades', function () {
    $cidade = $_POST['cidade'];
    $unidades = Unidade::where('cidade', '=', $cidade)->get();

    if (Auth::check()) {
        return view('unidades.indexByCidadeLogged', ['unidades' => $unidades]); 
    } else {
        return view('unidades.indexByCidade', ['unidades' => $unidades]); 
    }
})->name('buscaUnidades');

Route::resource('/pessoas', PessoaController::class);
Route::resource('/registros', RegistroController::class);
Route::resource('/unidades', UnidadeController::class);
Route::resource('/vacinas', VacinaController::class);

Route::get('/logout', function () {
    Auth::logout();

    return redirect('');
})->name('logout');

Auth::routes();
