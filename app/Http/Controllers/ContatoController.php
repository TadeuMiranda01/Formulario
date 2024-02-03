<?php
namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = Contato::all();
        return view('contatos.index', compact('contatos'));
    }

    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'nome' => 'required|string|min:2', // Apenas strings com pelo menos 2 caracteres
            'contato' => 'required|regex:/^\d{9}$/|unique:contatos', // Apenas números com 10 dígitos
            'email' => 'required|email|unique:contatos',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'contato.required' => 'O campo contato é obrigatório.',
            'contato.regex' => 'O campo contato deve ter 9 dígitos numéricos.',
            'contato.unique' => 'O contato já está sendo utilizado por outro usuário.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está sendo utilizado por outro usuário.',
        ]);

        Contato::create($request->all());

        return redirect()->route('contatos.index')
            ->with('success', 'Contato criado com sucesso.');
    }

    public function show($id)
    {
        $contato = Contato::findOrFail($id);
        return view('contatos.show', compact('contato'));
    }

    public function edit($id)
    {
        $contato = Contato::findOrFail($id);
        return view('contatos.edit', compact('contato'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|min:6',
            'contato' => 'required|digits:9|unique:contatos,contato,'.$id,
            'email' => 'required|email|unique:contatos,email,'.$id,
        ]);

        $contato = Contato::findOrFail($id);
        $contato->update($request->all());

        return redirect()->route('contatos.index')
            ->with('success', 'Contato atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return redirect()->route('contatos.index')
            ->with('success', 'Contato excluído com sucesso.');
    }
}
