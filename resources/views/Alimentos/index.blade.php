@extends('layouts.app')

@section('content')
<h1>Lista de Alimentos</h1>

{{-- Mensagem de sucesso --}}
@if(session('sucesso'))
    <p style="color: green;">{{ session('sucesso') }}</p>
@endif

<a href="{{ route('alimentos.create') }}">Adicionar Novo Alimento</a>
<br>
<a href="{{ route('alimentos.proximos') }}">Ver Alimentos com Validade Próxima</a>

<ul>
    @forelse($alimentos as $alimento)
        <li>
            <strong>{{ $alimento->nome }}</strong> -
            Quantidade: {{ $alimento->quantidade }} -
            Validade: {{ $alimento->validade ?? 'Sem validade' }} -
            Categoria: {{ $alimento->categoria ?? 'Sem categoria' }}

            <a href="{{ route('alimentos.edit', $alimento) }}">Editar</a>

            <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
            </form>
        </li>
    @empty
        <li>Nenhum alimento cadastrado.</li>
    @endforelse
</ul>
@endsection
