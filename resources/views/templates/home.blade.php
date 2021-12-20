<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="{{ asset('css/home.css') }}">
		@stack('styles')

		<title>Khanban</title>
	</head>

	<body>
		<nav>
			<a href="">Khanban</a>
			<a href="">O que somos?</a>
			<a href="">Criar Conta</a>
			<a href="{{ route('login') }}">Login</a>
		</nav>	

		<main>
			@yield('conteudo')
		</main>

		<footer>
			<p>Todos os direitos reservados: <a href="https://github.com/Scemist">github.com/Scemist</a>© - 2021</p>
		</footer>
	</body>
</html>