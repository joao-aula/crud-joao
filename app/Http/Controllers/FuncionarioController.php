<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{

    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.layout', compact('funcionarios')); //index
    }

    public function create()
    {
        return view('navbar');
    }

    public function store(Request $request)
    {
        Funcionario::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'email' => $request->email,
        ]);
      //  $show = Funcionario::create($validatedData);
      return redirect()->to('/')->with('success', 'Funcionario cadastrado com sucesso!');

    }

    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());

        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'idade' => 'required|numeric',
            'email' => 'required',
        ]);
        return redirect()->to('/');
        
 //       Funcionario::whereId($id)->update($validatedData);
//      return redirect('/funcionarios')->with('success', 'Dados do funcionarios atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();
        return redirect('/funcionarios')->with('success', 'Funcionario apagado com sucesso!');
    }
}
