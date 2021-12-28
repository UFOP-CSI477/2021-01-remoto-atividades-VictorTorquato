<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ComponentController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        return view('component.show', ['component' => $component]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(Component $component)
    {
        $component->data_rev = strval(date("Y-m-d"));

        $car = $component->car;
        $car->revisao = strval(date("Y-m-d"));

        $proxRev = $this->getProxRev($component);

        if ($component->data_prox_rev != null) {
            $component->data_prox_rev = $proxRev->date;
        }

        if ($component->km_prox_rev != null) {
            $component->km_prox_rev = $proxRev->km;
            $component->km_rev = $component->car->km;
        }

        $car->update();
        $component->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        //
    }

    private function getProxRev(Component $component) 
    {
        $car_km = $component->car->km;

        switch($component->nome) {

            case 'luzes':
                return (object)['date' => Carbon::now()->addDays(15)->format("Y-m-d")];
            break;

            case 'ca_pneus':
                return (object)['date' => Carbon::now()->addMonths(1)->format("Y-m-d")];
            break;

            case 'limpadores':
                return (object)['date' => Carbon::now()->addMonths(1)->format("Y-m-d")];
            break;

            case 'agua_radiador':
                return (object)['date' => Carbon::now()->addMonths(2)->format("Y-m-d")];
            break;
                
            case 'correias':
                return (object)[
                    'date' => Carbon::now()->addMonths(6)->format("Y-m-d"),
                    'km' => $car_km + 5000
                ];
            break;
                
            case 'alinhamento':
                return (object)['km' => $car_km + 10000];
            break;
                
            case 'oleo_motor':
                return (object)['km' => $car_km + 5000];
            break;

            case 'freio':
                return (object)['km' => $car_km + 10000];
            break;

            case 'filtro_ar':
                return (object)['km' => $car_km + 10000];
            break;

            case 'filtro_combustivel':
                return (object)['km' => $car_km + 10000];
            break;

            case 'filtro_oleo':
                return (object)['km' => $car_km + 5000];
            break;

            case 'velas':
                return (object)['km' => $car_km + 20000];
            break;
        }
    }
}
