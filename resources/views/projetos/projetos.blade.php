@extends('templates/index')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/projetos.css') }}">
@endpush

@section('conteudo')
	<h1>Projetos</h1>

	<div class="card">
		<table>
			<thead>
				<tr>
					<th>Título</th>
					<th>Descrição</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@foreach ($projetos as $projeto)
				<tr>
					<th>{{ $projeto->titulo }}</th>
					<td>{{ $projeto->descricao }}</td>
					<td><a href="{{ route('projetos.show', $projeto->id) }}" class="btn yellow">Editar</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop