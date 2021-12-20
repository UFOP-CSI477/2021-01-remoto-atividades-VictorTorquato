<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;
use Session;

class RequestController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
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
        $subjects = Subject::orderBy('name')->get();
        return view('requests.create', [ 'subjects' => $subjects ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $description = $_POST['description'];
        $subject = $_POST['subject'];
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $date = strval(date('Y-m-d H:i:s'));
        
        // Validação
        if (empty($subject) || empty($description))
        {
            Session::flash('message', 'Dados Inválidos!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return back();
        } else {

            Requests::create([
                'user_id' => $user_id, 
                'subject_id' => $subject, 
                'person' => $user_name, 
                'description' => $description, 
                'date' => $date
            ]);

            Session::flash('message', 'Protocolo criado com sucesso!');
            Session::flash('alert-class', 'alert-success'); 

            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Requests $request)
    {
        if (Auth::check()) {
            return view('requests.show', ['request' => $request]);
        } else {
            return view('requests.showUnlogged', ['request' => $request]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Requests $request)
    {
        $subjects = Subject::orderBy('name')->get();
        return view('requests.edit', ['request' => $request, 'subjects' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Requests $request)
    {
        $subject = $_POST['subject'];
        $description = $_POST['description'];

        $request->subject_id = $subject;
        $request->description = $description;
        
        $request->update();

        Session::flash('message', 'Protocolo atualizado com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return view('requests.show', ['request' => $request]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests $request)
    {
        $request->delete();
        Session::flash('message', 'Protocolo excluído com sucesso!');
        Session::flash('alert-class', 'alert-success'); 
        return redirect('home');
    }
}
