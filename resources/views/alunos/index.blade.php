<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD de Tarefas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .box { max-width: 700px; margin: 0 auto; }
        input[type="text"] { width: 100%; padding: 10px; }
        button { padding: 8px 12px; cursor: pointer; }
        .row { display: flex; gap: 10px; align-items: center; }
        .aluno { padding: 12px; border: 1px solid #ddd; margin-top: 10px; border-radius: 8px; }
        .aluno form { margin: 0; }
        .muted { color: #666; font-size: 12px; }
    </style>
</head>
<body>
<div class="box">
    <h2>Alunos</h2>

    {{-- Erros --}}
    @if ($errors->any())
        <div style="background:#ffe5e5;padding:12px;border-radius:8px;">
            <b>Ops:</b>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form criar --}}
    <form action="{{ route('alunos.store') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <div class="row">
            <div style="flex:1;">
                <input type="text" name="title" placeholder="Digite uma tarefa..." value="{{ old('title') }}">
            </div>
            <button type="submit">Adicionar</button>
        </div>
    </form>

    <hr style="margin: 20px 0;">

    {{-- Listagem + Editar + Deletar na mesma tela --}}

    @forelse($alunos as $aluno)
        <div class="aluno">
            <form action="{{ route('alunos.update', $aluno) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <input type="checkbox" name="done" {{ $aluno->done ? 'checked' : '' }}>
                    <div style="flex:1;">
                        <input type="text" name="title" value="{{ $aluno->nome }}">
                        <div class="muted">#{{ $aluno->id }} • {{ $aluno->created_at->format('d/m/Y H:i') }}</div>
                    </div>

                    <button type="submit">Salvar</button>
                </div>
            </form>

            <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" style="margin-top:10px;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Excluir essa tarefa?')">Excluir</button>
            </form>
        </div>
    @empty
        <p>Nenhum aluno cadastrado ainda.</p>
    @endforelse
</div>
</body>
</html>