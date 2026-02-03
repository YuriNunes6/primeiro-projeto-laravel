<?php

namespace App\Http\Controllers;

use App\Models\Aluno; //Acessa a tabela de alunos
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|min:3',
            'email' => 'required|email|unique:alunos,email',
            'data' => 'required|date',
        ]);

        Aluno::create($validated);
        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);
        
        $validated = $request->validate([
        'nome' => 'required|string|min:3',
        'email' => 'required|email|unique:alunos,email,' . $aluno->id,
        'data_nascimento' => 'required|date',
    ]);

        $aluno->update($validated);
    
        $aluno->update($request->all());
        return redirect()->route('alunos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno->delete();
        return redirect()->route('alunos.index');
    }
}
