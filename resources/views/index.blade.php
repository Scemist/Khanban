@extends('templates/index-template')

@push('styles')
	<style>
		main > * {
			padding: 1rem 2rem;
		}
		h1 {
			font-weight: 400;
		}
		p {
			line-height: 1.8rem;
		}
		section {
			background: #e9e7e1;
			display: flex;
		}
		img {
			height: 36vh;
		}
	</style>
@endpush

@section('conteudo')
	<h1>Anything in Time</h1>

	<section>
		<img src="https://artia.com/wp-content/uploads/2020/03/Imagem-destaque-quadro-kanban-696x364.png" alt="Sumiu">
		<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae ad veniam, natus impedit suscipit quidem temporibus. Temporibus nostrum dolores ipsum ullam alias vel, qui incidunt, iusto omnis sed corporis earum quos sunt est laborum cum, nemo nesciunt. Minus natus eos corrupti soluta magnam ea vero fugit placeat fuga exercitationem nam eius, quisquam nostrum magni necessitatibus adipisci assumenda itaque nihil, ad rerum nesciunt aliquid debitis nisi maxime. Excepturi.</p>
	</section>
@stop