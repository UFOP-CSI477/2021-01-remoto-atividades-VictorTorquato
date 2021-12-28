<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Session;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $cars_id = Auth::user()->cars;
        } else {
            $cars_id = [];
        }
        $cars = [];
        
        if ($cars_id !== null) {
            foreach ($cars_id as $id) {
                $car = Car::find($id);
                array_push($cars, $car);
            }
        }
        
        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    private function create_components(Car $car)
    {
        $car_id = $car->id;
        $nome = "luzes";
        $label = "Lanternas e Setas";
        $data_rev = date("Y-m-d");
        $data_prox_rev = Carbon::now()->addDays(15)->format("Y-m-d");

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label,
            'data_rev' => $data_rev,
            'data_prox_rev' => $data_prox_rev
        ]);

        $nome = "ca_pneus";
        $label = "Calibrar Pneus";
        $data_prox_rev = Carbon::now()->addMonths(1)->format("Y-m-d");

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label,
            'data_rev' => $data_rev,
            'data_prox_rev' => $data_prox_rev
        ]);

        $nome = "limpadores";
        $label = "Palhetas dos Limpadores";
        $data_prox_rev = Carbon::now()->addMonths(1)->format("Y-m-d");

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label,
            'data_rev' => $data_rev,
            'data_prox_rev' => $data_prox_rev
        ]);

        $nome = "agua_radiador";
        $label = "Agua do Radiador";
        $data_prox_rev = Carbon::now()->addMonths(2)->format("Y-m-d");

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label,
            'data_rev' => $data_rev,
            'data_prox_rev' => $data_prox_rev
        ]);

        $nome = "correias";
        $label = "Correias do Motor";
        $data_prox_rev = Carbon::now()->addMonths(6)->format("Y-m-d");
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 5000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
            'data_prox_rev' => $data_prox_rev
        ]);

        $nome = "alinhamento";
        $label = "Alinhamento e Balanceamento";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 10000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);

        $nome = "oleo_motor";
        $label = "Óleo do Motor";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 5000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);

        $nome = "freio";
        $label = "Pastilhas de Freio";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 10000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);

        $nome = "filtro_ar";
        $label = "Filtro de Ar";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 10000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);

        $nome = "filtro_combustivel";
        $label = "Filtro de Combustível";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 10000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);

        $nome = "filtro_oleo";
        $label = "Filtro de Óleo";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 5000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);

        $nome = "velas";
        $label = "Velas de Ingnição";
        $km_rev = $car->km;
        $km_prox_rev = $car->km + 20000;

        Component::create([
            'car_id' => $car_id,
            'nome' => $nome, 
            'label' => $label, 
            'km_rev' => $km_rev, 
            'km_prox_rev' => $km_prox_rev,
            'data_rev' => $data_rev,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $km = $_POST['km'];

        $revisao = strval(date("Y-m-d"));
        $km_update = date("Y-m-d");

        $user_id = Auth::user()->id;

        // Validação
        if (!empty($marca) && !empty($modelo) && !empty($km) && !empty($revisao) && $user_id == Auth::user()->id) {
            
            $car = Car::create([
                'user_id' => $user_id,
                'marca' => $marca,
                'modelo' => $modelo,
                'km' => $km,
                'km_update' => $km_update,
                'revisao' => $revisao,
            ]);

            $this->create_components($car);

            $user = Auth::user();
            
            if($user->cars != null) {
                $user_cars = $user->cars;
            } else {
                $user_cars = [];
            }

            array_push($user_cars, $car->id);
            $user->cars = $user_cars;
            $user->update();

            Session::flash('message', 'Carro cadastrado com sucesso!');
            Session::flash('alert-class', 'alert-success'); 

            return redirect('car');
        } else {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $components = [];
        $now = Carbon::now();
        
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

        $comp = collect($components)->sortBy('data_prox_rev');
        $comp = collect($comp)->sortBy('km_prox_rev');
        $comp = collect($comp)->sortBy('priority');

        return view('car.show', ['car' => $car, 'components' => $comp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('car.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Car $car)
    {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $km = $_POST['km'];

        if (!empty($marca) && !empty($modelo) && !empty($km) && !empty($car)) {

            $car->marca = $marca;
            $car->modelo = $modelo;

            if ($car->km != $km) {
                $car->km = $km;
                $car->km_update = date("Y-m-d");
            }

            $car->update();

            Session::flash('message', 'Carro editado com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('car');
            
        } else {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $id = $car->id;

        $user = Auth::user();
        $cars = $user->cars;
        $cars = \array_diff($cars, [$id]);

        $user->cars = $cars;
        $user->update();

        Component::where('car_id', '=', $id)->delete();
        $car->delete();

        Session::flash('message', 'Carro excluído com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
}
