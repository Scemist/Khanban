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
		<figure>
			<a href="{{ route('projetos.criar') }}">	
				<svg fill="currentColor" viewbox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
				</svg>
				New project
			</a>
		</figure>
	</section>
@stop