<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class PainelController extends Controller
{
    public function index(User $user, Request $request) {
        $perPage = 10;
        $search = $request->search;

        if (!empty($search)) {
            $usuarios = User::Where('name', 'LIKE', "%$search%")->paginate($perPage);
        } else {
            $usuarios = User::paginate($perPage);
        }
        return view('painel.principal')->with('usuarios', $usuarios)
                                       ->with('search', $search);
    }

    public function edit($id, User $user) {
        if ($id === '1' || Auth::user()->id == $id) {
            return redirect()->back()->with('error', 'você não tem acesso para editar este administrador');
        };
        
            $user = User::find($id);
                 if ($user) {
                 return view('painel.edit', compact('user'));
                };
                 return redirect()->back()->with('error', 'usuário não encontrado');
    }

    public function update($id, Request $request, User $user) {
        if (!$user = User::find($id)) {
         return redirect()->back()->with('error', 'Usuário não encontrado');
        } 
        
        $rules = [
         'name' => 'required|min:3|max:100',
         'email' => 'required', Rule::unique('users')->ignore($id),
         'admin' => 'required',
     ];
 
     $validator = Validator::make($request->all(), $rules);
 
     if($validator->fails()) {
         return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
     }

       $data = $request->all();
       if ($data['admin'] === "1") {
        $data['admin'] = 1;
       } else {
        $data['admin'] = 0;
       }
       $user->update($data);
       return redirect()->route('painel.index')->with('message', 'Usuário EDITADO com sucesso !');
    }
}
