<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        // dd($request->all());
        // var_dump($_POST);

        // echo $request->input('nome');
        // echo '<br>';
        // echo $request->input('email');
        // echo '<br>';
        // echo $request->input('mensagem');
        // echo '<br>';

        // $contato = new Contato();
        // $contato->nome = $request->input('nome');
        // $contato->email = $request->input('email');
        // $contato->telefone = $request->input('telefone');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // //dd($contato);
        // $contato->save();

        // $contato = new Contato();
        // $contato->create($request->all());

        return View('site.contato', ['pagina' => 'Página de ']);
    }

    public function salvar(Request $request) {
        
        //Validar os campos antes de inserir
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:contatos',
            'telefone' => 'required|min:9|max:20',
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        //inserir os campos se for validado
        Contato::create($request->all());
        return redirect()->route('site.principal');
    }
}
