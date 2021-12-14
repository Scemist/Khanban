@extends('templates/index')
@section('conteudo')
	<form action="{{ route('projetos.update', $projeto->id) }}" method="GET">
		<input type="text" value="{{ $projeto->titulo }}" class="in">
		<input type="text" value="{{ $projeto->descricao }}" class="in">

		<input type="submit" value="Editar" class="btn yellow">
	</form>

	<hr>
	<form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST">
		@method('DELETE')
		@csrf
		<input type="submit" value="Deletar Projeto" class="btn red">
	</form>
@stop

@push('scripts')
	<script>
		console.log('yaa')
	</script>
@endpush