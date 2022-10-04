@extends('templates.index-template')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/projeto-form.css') }}">
@endpush

@section('conteudo')
<div id="card">
	<h2>Criar Novo Projeto</h2>

	<form action="{{ route('projects.store') }}" method="POST">
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