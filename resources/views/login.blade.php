<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="{{ asset('css/root.css') }}">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">

	<title>Login - Khanban</title>
</head>
<body>
	<main>
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
						<input type="submit" value="Entrar" class="btn">
					</div>
				</fieldset>
			</form>
			
			<blockquote>
				<p><a href="">Não se lembra da senha?</a></p>
			</blockquote>
		</div>

		<blockquote>
			<p>Ainda não tem cadastro? <a href="{{ route('users.create') }}">Faça aqui!</a></p>
		</blockquote>
	</main>	
</body>
</html>

	