<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;
use Session;

class UnidadeController extends Controller
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
        $unidades = Unidade::all();
        return view('unidades.index', [ 'unidades' => $unidades ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidades.create');
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
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        
        // Validação
        if (empty($nome) || empty($bairro) || empty($cidade) || empty($estado))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();

        } else {

            Unidade::create([
                'nome' => $nome, 
                'bairro' => $bairro, 
                'cidade' => $cidade, 
                'estado' => $estado
            ]);

            Session::flash('message', 'Unidade cadastrada com sucesso!');
            Session::flash('alert-class', 'alert-success'); 

            return redirect('unidades');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        return view('unidades.show', ['unidade' => $unidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        return view('unidades.edit', ['unidade' => $unidade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Unidade $unidade)
    {
        $nome = $_POST['nome'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        
        // Validação
        if (empty($nome) || empty($bairro) || empty($cidade) || empty($estado))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();

        } else {
            
            $unidade->nome = $nome;
            $unidade->bairro = $bairro;
            $unidade->cidade = $cidade;
            $unidade->estado = $estado;
            
            $unidade->update();

            Session::flash('message', 'Unidade atualizada com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('unidades');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidade  $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        Session::flash('message', 'Unidade excluída com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return redirect('unidades');
    }
}
