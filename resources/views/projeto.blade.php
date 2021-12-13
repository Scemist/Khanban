@extends('templates/index')
@section('conteudo')
	<h2>{{ $projeto->titulo }}</h2>
	<p>{{ $projeto->descricao }}</p>
@stop