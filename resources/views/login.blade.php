@extends('templates/home')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('conteudo')
	<div class="card">
		<h2>Faça login para acessar o sistema</h2>

		<form action="{{ route('auth.login') }}" method="POST">
			@csrf
			<fieldset>
				<div class="in-group email">
					<label>Email</label>
					<input type="email" name="email" class="in">
				</div>
			
				<div class="in-group senha">
					<label>Senha</label>
					<input type="password" name="senha" class="in">
				</div>

				<div class="in-group entrar">
					<input type="submit" value="Entrar" class="btn blue">
				</div>
			</fieldset>
		</form>
		
		<blockquote>
			<p><a href="">Não se lembra da senha?</a></p>
		</blockquote>
	</div>

	<blockquote>
		<p>Ainda não tem cadastro? <a href="">Faça aqui!</a></p>
	</blockquote>
@stop