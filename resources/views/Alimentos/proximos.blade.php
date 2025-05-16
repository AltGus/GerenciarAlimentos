@extends('layouts.app')

@section('content')
<h1>Alimentos com validade próxima</h1>

<ul>
    @forelse($alimentos as $alimento)
        <li>
            <strong>{{ $alimento->nome }}</strong> - Validade: {{ $alimento->validade }}
        </li>
    @empty
        <li>Nenhum alimento com validade próxima.</li>
    @endforelse
</ul>

<a href="{{ route('alimentos.index') }}">Voltar para a lista</a>
@endsection
