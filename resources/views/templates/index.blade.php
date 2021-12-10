<!DOCTYPE html>
	<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="{{ asset('css/index.css') }}">
		@stack('styles')

		<title>Khanban</title>
	</head>
	<body>
		<nav>
			<a href="#">Início</a>
			<a href="#">Projetos</a>
			<a href="#">Board</a>
			<a href="#">Configurações</a>
		</nav>

		<aside>
			<div class="group">
				<button>Projetos</button>
				<ul>
					<li>
						<button>Criar Projeto</button>
					</li>
					<li>
						<button>Gerenciar</button>
					</li>
				</ul>
			</div>
			
			<div class="group">
				<button>Usuário</button>
				<ul>
					<li>
						<button>Novo Usuário</button>
					</li>
					<li>
						<button>Ver Usuários</button>
					</li>
				</ul>
			</div>
		</aside>

		<main>
			@yield('conteudo')
		</main>

		<footer>
			<p>
				Todos os direitos reservados: <a href="https://github.com/Scemist">github.com/Scemist</a>© - 2021
			</p>
		</footer>		
	</body>
</html>