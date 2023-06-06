<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index(Request $request) {
       return view('funcionario.index');
    }

    public function create() {
        return view('funcionario.create');
    }

    public function store(Funcionario $funcionario, Request $request) {
        
    }
    
    public function show($id) {

    }

    public function update ($id, Funcionario $funcionario) {

    }

    public function destroy($id, Funcionario $funcionario) {

    }

}
