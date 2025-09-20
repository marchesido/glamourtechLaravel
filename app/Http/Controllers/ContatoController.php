<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        return view('contato');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:18|max:120',
            'genero' => 'required|string',
            'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            'email' => 'required|email',
            'endereco' => 'required|string',
            'cep' => 'required|regex:/^\d{5}-\d{3}$/',
            'telefone' => 'required|regex:/^\(\d{2}\) \d{4,5}-\d{4}$/',
            'mensagem' => 'required|string|max:1000',
        ]);

        // Aqui você pode salvar no banco ou enviar email
        // Por enquanto, só vamos simular uma resposta
        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}