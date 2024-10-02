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
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|min:9|max:20',
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'telefone.required' => 'O campo telefone deve ser preenchido',
            'telefone.min' => 'O campo telefone deve ter no mínimo 9 caracteres',
            'telefone.max' => 'O campo telofone deve ter no máximo 20 caracteres',
            'email.email' => 'O campo email deve ser um email válido',
            'motivo_contato.required' => 'O campo motivo de contato precisa ser preenchido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres'
        ];

        $request->validate($regras, $feedback);

        //inserir os campos se for validado
        Contato::create($request->all());
        return redirect()->route('site.principal');
    }
}
