<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class produtoControler extends Controller
{
    public function index(){

     //verifica se a sessao está ativa
     if(!Session::has('login')){
        return redirect('/');
    }
        return view('produto.index');
    }
}
