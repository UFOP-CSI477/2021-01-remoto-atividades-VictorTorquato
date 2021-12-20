<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Session;

class SubjectController extends Controller
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
        // $subject = Subject::orderBy('name')->get();
        // return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        
        // Validação
        if (empty($name) || empty($price))
        {
            Session::flash('message', 'Dados inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        } else {

            Subject::create(['name' => $name, 'price' => $price]);
            Session::flash('message', 'Tipo criado com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subjects.show', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subjects.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Subject $subject)
    {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $subject->name = $name;
        $subject->price = $price;
        
        $subject->update();

        Session::flash('message', 'Tipo atualizado com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return view('subjects.show', ['subject' => $subject]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        if (count($subject->requests) > 0)
        {
            Session::flash('message', 'O tipo de protocolo em questão ainda possui protocolos, portanto não há como excluir!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        } else {
            $subject->delete();
            Session::flash('message', 'Tipo excluído com sucesso!');
            Session::flash('alert-class', 'alert-success'); 
            return redirect('home');
        }
    }
}
