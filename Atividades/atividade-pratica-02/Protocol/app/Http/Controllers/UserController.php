<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Requests;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function loginView()
    {
        return view('login.index');
    }

    public function handleLogin()
    {
        $userdata = array(
            'email'     => $_POST['email'],
            'password'  => $_POST['password'],
        );

        echo($_POST['email']);
    
        if (Auth::attempt($userdata)) {
    
            return Redirect::intended('');
    
        } else {
    
            return back()->with('error','Usuário não encontrado ou senha inválida!');
    
        }
    }

    public function handleLogout()
    {
        Auth::logout();

        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sigin.index');
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
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        
        // Validação
        if ($password != $passwordRepeat)
        {
            alert('As senhas inseridas são distintas, confira-as e tente novamente!');

        } else {
            User::create(['name' => $name, 'email' => $email, 'password' => $password]);

            return redirect('');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Auth::logout();

        $user->delete();

        Session::flash('message', 'Conta excluída com sucesso!');
        Session::flash('alert-class', 'alert-success'); 

        return redirect('/home');
    }
}
