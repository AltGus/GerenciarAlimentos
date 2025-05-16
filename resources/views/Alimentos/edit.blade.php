@extends('layouts.app')

@section('content')
<h1>Editar Alimento</h1>

{{-- Exibe erros de validação, se houver --}}
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('alimentos.update', $alimento) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ old('nome', $alimento->nome) }}" required>
    </div>

    <div>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade', $alimento->quantidade) }}" required>
    </div>

    <div>
        <label for="validade">Validade:</label>
        <input type="date" id="validade" name="validade" value="{{ old('validade', $alimento->validade) }}">
    </div>

    <div>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="{{ old('categoria', $alimento->categoria) }}">
    </div>

    <button type="submit">Atualizar</button>
</form>

<a href="{{ route('alimentos.index') }}">Voltar para a lista</a>
@endsection
