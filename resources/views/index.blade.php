@extends('templates/index-template')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('conteudo')
	<section>
		<h1>Anything in Time</h1>

		<div class="highlight">
			<img src="https://artia.com/wp-content/uploads/2020/03/Imagem-destaque-quadro-kanban-696x364.png" alt="Sumiu">
			<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae ad veniam, natus impedit suscipit quidem temporibus. Temporibus nostrum dolores ipsum ullam alias vel, qui incidunt, iusto omnis sed corporis earum quos sunt est laborum cum, nemo nesciunt. Minus natus eos corrupti soluta magnam ea vero fugit placeat fuga exercitationem nam eius, quisquam nostrum magni necessitatibus adipisci assumenda itaque nihil, ad rerum nesciunt aliquid debitis nisi maxime. Excepturi.</p>
		</div>
	</section>

	<section class="projetos">
		@foreach ($projetos as $projeto)
		<figure>
			<a href="{{ route('projetos.board', $projeto->id) }}">	
				<h3>{{ $projeto->titulo }}</h3>
				<p>{{ $projeto->descricao }}</p>
			</a>
		</figure>
		@endforeach
	</section>
@stop