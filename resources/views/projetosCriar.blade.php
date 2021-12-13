@extends('templates/index')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/projetosCriar.css') }}">
@endpush

@section('conteudo')
	<div id="card">
		<h2>Criar Novo Projeto</h2>

		<form action="" method="POST">
			@csrf

			<fieldset>
					<label>Título</label>
					<input type="text">

					<label>Descrição</label>
					<textarea rows="5"></textarea>
			</fieldset>

			<input type="submit" value="Cadastrar" id="cadastrar">
		</form>
	</div>
@stop