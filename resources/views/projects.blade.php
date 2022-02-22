@extends('templates/project-template')
@section('conteudo')

<h1>Projetos que Estou</h1>

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
				<td><a href="{{ route('projects.board', $projeto->id) }}" class="btn yellow">Entrar</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop