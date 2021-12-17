<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login - Khanboard</title>
</head>

<body>
	<main>
		<section>
			<form action="{{ route('auth.login') }}" method="POST">
				@csrf
				<fieldset>
					<label>Email</label>
					<input type="email" name="email">
				</fieldset>

				<fieldset>
					<label>Senha</label>
					<input type="password" name="senha">
				</fieldset>

				<input type="submit" value="Entrar">
			</form>
		</section>
	</main>
</body>
</html>
