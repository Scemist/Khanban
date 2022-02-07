@extends('templates.index-template')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/criar.css') }}">
@endpush

@section('conteudo')
<div id="card">
	<h2>Criar Novo Projeto</h2>

	<form action="{{ route('projetos.store') }}" method="POST">
		@csrf

		<fieldset>
			<label>Título</label>
			<input type="text" name="titulo">

			<label>Descrição</label>
			<textarea rows="5" name="descricao"></textarea>
		</fieldset>

		<input type="submit" value="Cadastrar" id="cadastrar" class="btn green">
	</form>
</div>

@stop