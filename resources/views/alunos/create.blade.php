<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alunos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #82C0D9 }
        .box { max-width: 80%; margin: 0 auto; padding: 36px; border-radius: 10px; border: 1px solid #F5F5F5; background-color: white; }
        input[type="text"] { width: 30%; padding: 10px; }
        input[type="email"] { width: 30%; padding: 10px; }
        input[type="date"] { width: 30%; padding: 10px; }
        button { padding: 8px 12px; cursor: pointer; }
        form { padding-left: 6px; }
        .row { display: flex; gap: 10px; align-items: center; }
        .btn-container { padding-top: 12px; text-align: center; }
        .btn-acoes { padding: 8px; width: 100%; cursor: pointer; margin-top: 10px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<div class="box">
    <h2>Cadastrar Aluno</h2>

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

    {{-- Cadastrar Novo Aluno --}}
    <form action="{{ route('alunos.store') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <div class="row">
                <input type="text" name="nome" placeholder="Insira seu nome..." value="{{ old('nome') }}">
                <input type="email" name="email" placeholder="Insira seu email..." value="{{ old('email') }}">
                <input type="date" name="data_nascimento" placeholder="Informe sua data de nascimento..." value="{{ old('data_nascimento') }}">
        </div>

        <div class="btn-container">
            <button class="btn-acoes" type="submit">Confirmar</button>
            <a href="{{ route('alunos.index') }}">
                <button type="button" class="btn-acoes">Meus Alunos</button>
            </a>
        </div>
    </form>
