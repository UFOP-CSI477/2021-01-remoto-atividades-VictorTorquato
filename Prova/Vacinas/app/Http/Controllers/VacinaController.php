<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;
use Session;

class VacinaController extends Controller
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
        $vacinas = Vacina::all();
        return view('vacinas.index', [ 'vacinas' => $vacinas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $_POST['nome'];
        $fabricante = $_POST['fabricante'];
        $pais = $_POST['pais'];
        $doses = $_POST['doses'];
        
        // Validação
        if (empty($nome) || empty($fabricante) || empty($pais) || empty($doses))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();

        } else {

            Vacina::create([
                'nome' => $nome, 
                'fabricante' => $fabricante, 
                'pais' => $pais, 
                'doses' => $doses
            ]);

            Session::flash('message', 'Vacina cadastrada com sucesso!');
            Session::flash('alert-class', 'alert-success'); 

            return redirect('vacinas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function show(Vacina $vacina)
    {
        return view('vacinas.show', ['vacina' => $vacina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacina $vacina)
    {
        return view('vacinas.edit', ['vacina' => $vacina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function update(Vacina $vacina)
    {
        $nome = $_POST['nome'];
        $fabricante = $_POST['fabricante'];
        $pais = $_POST['pais'];
        $doses = $_POST['doses'];
        
        // Validação
        if (empty($nome) || empty($fabricante) || empty($pais) || empty($doses))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();

        } else {
                
            $vacina->nome = $nome;
            $vacina->fabricante = $fabricante;
            $vacina->pais = $pais;
            $vacina->doses = $doses;
            
            $vacina->update();

            Session::flash('message', 'Vacina atualizada com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('vacinas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacina $vacina)
    {
        $vacina->delete();
        Session::flash('message', 'Vacina excluída com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return redirect('vacinas');
    }
}
