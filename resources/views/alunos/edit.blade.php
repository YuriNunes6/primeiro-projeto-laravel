<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alunos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #82C0D9 }
        .box { max-width: 80%; margin: 0 auto; padding: 24px; border-radius: 10px; border: 1px solid #F5F5F5; background-color: white; }
        input[type="text"] { width: 30%; padding: 10px; }
        input[type="email"] { width: 30%; padding: 10px; }
        input[type="date"] { width: 30%; padding: 10px; }
        button { padding: 8px 12px; cursor: pointer; }
        form { padding-left: 6px; }
        .row { display: flex; gap: 10px; align-items: center; }
        .aluno { padding: 12px; border: 1px solid #ddd; margin-top: 10px; border-radius: 8px; }
        .aluno form { margin: 0; }
        .btn-container { padding-top: 12px; display: flex; gap: 5px; margin-top: 10px;}
        .btn-acoes { padding: 10px; cursor: pointer; }
        .btn-criar { text-align: center; margin-top: 15px; }
        .btn-criar button{ width: 100%; padding: 10px; cursor: pointer; }
        .muted { color: #666; font-size: 12px; padding-top: 10px; padding-bottom: 10px; }
        h2 { text-align: center; }
    </style>
</head>

<body>

<div class="box">
    <h2>Aluno selecionado: {{$aluno -> nome}}</h2>

        {{--Editar aluno--}}
        <div class="aluno">
            <form action="{{ route('alunos.update', $aluno) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                        <input type="text" name="nome" value="{{ $aluno->nome }}">
                        <input type="email" name="email" value="{{ $aluno->email }}">
                        <input type="date" name="data_nascimento" value="{{ $aluno->data_nascimento }}">

                    {{--Confirmar edição--}}
                    <button type="submit" class="btn-acoes">Confirmar</button>
                </div>
            </form>

            <div class="btn-container">

                {{--Deletar Aluno--}}
                <form action="{{ route('alunos.destroy', $aluno) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn-acoes" onclick="return confirm('Deseja excluir esse aluno?')">
                    Excluir
                    </button>
                </form>

                {{--Tela Inicial--}}
                <a href="{{ route('alunos.index') }}">
                    <button type="button" class="btn-acoes">Meus Alunos</button>
                </a>

        </div>
</div>
</body>
</html>