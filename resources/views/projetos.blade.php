@extends('templates/index')
@section('conteudo')
	@foreach ($projetos as $projeto)
		<h1>{{ $projeto->titulo }}</h1>
		<p>{{ $projeto->descricao }}</p>
	@endforeach
@stop