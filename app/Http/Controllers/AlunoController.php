<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|min:3',
            'email' => 'required|email|unique:alunos,email',
            'data_nascimento' => 'required|date',
        ]);

        Aluno::create($validated);

        return redirect()->route('alunos.index');
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|min:3',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'data_nascimento' => 'required|date',
        ]);

        $aluno->update($validated);

        return redirect()->route('alunos.index');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}