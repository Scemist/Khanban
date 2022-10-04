@extends('templates.index-template')

@section('conteudo')
	<div class="card">
		<h2>Cadastre-se e tenha acesso a tudo</h2>

		<form action="{{ route('users.store') }}" method="POST">
			@csrf
			<fieldset>
				<div class="in-group nome">
					<label>Nome e Sobrenome</label>
					<input type="text" name="nome" class="in">
				</div>
			
				<div class="in-group celular">
					<label>Celular</label>
					<input type="text" name="celular" class="in">
				</div>
			
				<div class="in-group email">
					<label>Email</label>
					<input type="email" name="email" class="in">
				</div>
			
				<div class="in-group senha">
					<label>Senha</label>
					<input type="password" name="senha" class="in">
				</div>

				<div class="in-group entrar">
					<input type="submit" value="Cadastrar" class="btn blue">
				</div>
			</fieldset>
		</form>
		
		<blockquote>
			<p><a href="">Não se lembra da senha?</a></p>
		</blockquote>
	</div>

	<blockquote>
		<p>Está de volta? <a href="{{ route('login') }}">Entre por aqui!</a></p>
	</blockquote>
@stop