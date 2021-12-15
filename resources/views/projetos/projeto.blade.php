@extends('templates/index')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/projeto.css') }}">
@endpush

@section('conteudo')
	<div id="card">

		<form action="{{ route('projetos.update', $projeto->id) }}" method="POST">
			@csrf
			@method('PUT')
			<fieldset>
				<label>Títiulo do Projeto</label>
				<input type="text" name="titulo" value="{{ $projeto->titulo }}" class="in">

				<label>Descrição do Projeto</label>
				<textarea type="text" name="descricao" class="in">{{ $projeto->descricao }}</textarea>
			</fieldset>

			<input type="submit" value="Editar" class="btn yellow">
		</form>

		<form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST">
			@method('DELETE')
			@csrf
			<input type="submit" value="Deletar Projeto" class="btn red">
		</form>
	</div>
@stop

@push('scripts')
	<script>
		console.log('yaa')
	</script>
@endpush