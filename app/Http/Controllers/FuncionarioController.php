<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateFuncionarios;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;

class FuncionarioController extends Controller
{
    public function index(Funcionario $funcionario) {
       $funcionarios = Funcionario::all();
       return view('dashboard', compact('funcionarios'));
    }

    public function create() {
        return view('funcionario.create');
    }

    public function store(Funcionario $funcionario, StoreUpdateFuncionarios $request) {
       
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $funcionario = Funcionario::create($data);

        return view('funcionario.show', compact('funcionario'));
    }
    
    public function show($id) {
        $funcionario = Funcionario::find($id);
       
       if(!$funcionario)
       return redirect()->back()->withErrors($validator);
      
       return view('funcionario.show', compact('funcionario'));

    }

    public function update ($id, Funcionario $funcionario) {

    }

    public function destroy($id, Funcionario $funcionario) {

    }

}
