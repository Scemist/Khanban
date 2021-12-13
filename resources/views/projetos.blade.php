@extends('templates/index')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/projetos.css') }}">
@endpush

@section('conteudo')
	<h1>Projetos Correios</h1>

	<div class="card">
		<table>
			<thead>
				<tr>
					<th>Título</th>
					<th>Descrição</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach ($projetos as $projeto)
				<tr>
					<th>{{ $projeto->titulo }}</th>
					<td>{{ $projeto->descricao }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop