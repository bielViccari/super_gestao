<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateFuncionarios;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class FuncionarioController extends Controller
{
    public function index(Funcionario $funcionario, Request $request) {
        $perPage = 10;
        $search = $request->search;
        
        if(!empty($search)) {
            $funcionarios = Funcionario::Where('name','LIKE',"%$search%")
            ->orWhere('section','LIKE', "%$search%")
            ->orWhere('function','LIKE', "%$search%")
            ->paginate($perPage);
        }
        else {
            $funcionarios = Funcionario::paginate($perPage);
        }
       return view('dashboard')
       ->with('funcionarios', $funcionarios)
       ->with('search', $search);
    }

    public function create() {
        return view('funcionario.create');
    }

    public function store(Funcionario $funcionario, StoreUpdateFuncionarios $request) {
        $rules = [
            'name' => 'required|min:3|max:100',
            'status' => 'required',
            'section' => 'required|min:3|max:100',
            'function' => 'required|min:3|max:100'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return redirect('funcionario.create')
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        $funcionario = Funcionario::create($data);

        return redirect() 
               ->route('funcionario.index')
               ->with('message', 'Funcionário ADICIONADO com sucesso');
    }
    
    public function show($id) {
       $funcionario = Funcionario::find($id);
       
       if(!$funcionario)
       return redirect()->back()->withErrors($validator);
      
       return view('funcionario.show', compact('funcionario'));

    }

    public function edit($id, Funcionario $funcionario) {
        $funcionario = Funcionario::find($id);
        $user = Auth::user()->id;
        if( $user === $funcionario->user_id) {
            if(!$funcionario){
                return redirect()->back()->withErrors($validator);
            }
            return view('funcionario.edit', compact('funcionario'));
        } else {
            return redirect()->route('funcionario.index');
        }
    }

    public function update (Funcionario $funcionario, StoreUpdateFuncionarios $request, $id) {
        
            if(!$funcionario = Funcionario::find($id)) {
                return redirect()->back()->withErrors($validator)->withInput();  
            } else {
                $data = $request->all();
                $data['user_id'] = Auth::user()->id;
                $funcionario->update($data);
    
                return redirect()->route('funcionario.index')->with('message', 'Funcionário ALTERADO com sucesso');
            }
    }

    public function destroy($id, Funcionario $funcionario) {
        $funcionario = Funcionario::findOrFail($id);
        $user = Auth::user()->id;
        if($user === $funcionario->user_id) {
            $funcionario->delete();
            return redirect()->route('funcionario.index')->with('message', 'Funcionário DELETADO com sucesso');
        }else {
            return redirect()->route('funcionario.index');
        }
    }

}
