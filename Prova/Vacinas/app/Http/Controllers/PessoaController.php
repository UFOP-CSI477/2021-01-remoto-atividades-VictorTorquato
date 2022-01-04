<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Session;

class PessoaController extends Controller
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
        $pessoas = Pessoa::all();
        return view('pessoas.index', [ 'pessoas' => $pessoas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
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
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        
        // Validação
        if (empty($nome) || empty($cpf) || empty($data_nascimento) || empty($bairro) || empty($cidade) || empty($estado))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        } else {

            Pessoa::create([
                'nome' => $nome, 
                'cpf' => $cpf, 
                'data_nascimento' => $data_nascimento, 
                'bairro' => $bairro, 
                'cidade' => $cidade, 
                'estado' => $estado
            ]);

            Session::flash('message', 'Pessoa cadastrada com sucesso!');
            Session::flash('alert-class', 'alert-success'); 

            return redirect('pessoas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return view('pessoas.show', ['pessoa' => $pessoa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', ['pessoa' => $pessoa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Pessoa $pessoa)
    {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        
        // Validação
        if (empty($nome) || empty($cpf) || empty($data_nascimento) || empty($bairro) || empty($cidade) || empty($estado))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        } else {
            
            $pessoa->nome = $nome;
            $pessoa->cpf = $cpf;
            $pessoa->data_nascimento = $data_nascimento;
            $pessoa->bairro = $bairro;
            $pessoa->cidade = $cidade;
            $pessoa->estado = $estado;
            
            $pessoa->update();

            Session::flash('message', 'Pessoa atualizada com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('pessoas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        Session::flash('message', 'Pessoa excluída com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return redirect('pessoas');
    }
}
