<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Pessoa;
use App\Models\Unidade;
use App\Models\Vacina;
use Illuminate\Http\Request;
use Session;

class RegistroController extends Controller
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
        $registros = Registro::all();
        return view('registros.index', [ 'registros' => $registros ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::all();
        $vacinas = Vacina::all();
        $unidades = Unidade::all();
        return view('registros.create', ['pessoas' => $pessoas, 'vacinas' => $vacinas, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoa_id = $_POST['pessoa_id'];
        $unidade_id = $_POST['unidade_id'];
        $vacina_id = $_POST['vacina_id'];
        $dose = $_POST['dose'];
        $data = $_POST['data'];
        
        // Validação
        if (empty($pessoa_id) || empty($unidade_id) || empty($vacina_id) || empty($dose) || empty($data))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();

        } else {

            Registro::create([
                'pessoa_id' => $pessoa_id, 
                'unidade_id' => $unidade_id, 
                'vacina_id' => $vacina_id, 
                'dose' => $dose, 
                'data' => $data
            ]);

            Session::flash('message', 'Registro criado com sucesso!');
            Session::flash('alert-class', 'alert-success'); 

            return redirect('registros');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        return view('registros.show', ['registro' => $registro, 'pessoas' => $pessoas, 'vacinas' => $vacinas, 'unidades' => $unidades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        $pessoas = Pessoa::all();
        $vacinas = Vacina::all();
        $unidades = Unidade::all();
        return view('registros.edit', ['registro' => $registro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        $pessoa_id = $_POST['pessoa_id'];
        $unidade_id = $_POST['unidade_id'];
        $vacina_id = $_POST['vacina_id'];
        $dose = $_POST['dose'];
        $data = $_POST['data'];
        
        // Validação
        if (empty($pessoa_id) || empty($unidade_id) || empty($vacina_id) || empty($dose) || empty($data))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();

        } else {
            
            $registro->pessoa_id = $pessoa_id;
            $registro->unidade_id = $unidade_id;
            $registro->vacina_id = $vacina_id;
            $registro->dose = $dose;
            $registro->data = $data;
            
            $registro->update();

            Session::flash('message', 'Registro atualizado com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('registros');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();
        Session::flash('message', 'Registro excluída com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return redirect('registros');
    }
}
