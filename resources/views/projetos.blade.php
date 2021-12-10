@extends('templates/index')
@section('conteudo')
	<h1>Projetos Correios</h1>

	@foreach ($projetos as $projeto)
		<hr>
		<h2>{{ $projeto->titulo }}</h2>
		<p>{{ $projeto->descricao }}</p>
	@endforeach
@stop