<!DOCTYPE html>
	<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="icon" href="{{ asset('favicon.svg') }}" sizes="any" type="image/svg+xml">
		<link rel="stylesheet" href="{{ asset('css/root.css') }}">
		<link rel="stylesheet" href="{{ asset('css/index.css') }}">

		<title>Khanban</title>
	</head>
	<body>
		<nav>
			<button id="burger">
				<div class="stick"></div>
				<div class="stick"></div>
				<div class="stick"></div>
			</button>
			<a href="#">
				<svg width="16" height="16" fill="snow" class="bi bi-house-door-fill" viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/></svg>
				Início
			</a>
			<a id="projetos">
				<svg width="16" height="16" fill="snow" class="bi bi-easel3-fill" viewBox="0 0 16 16"><path d="M8.5 12v1.134a1 1 0 1 1-1 0V12h-5A1.5 1.5 0 0 1 1 10.5V3h14v7.5a1.5 1.5 0 0 1-1.5 1.5h-5Zm7-10a.5.5 0 0 0 0-1H.5a.5.5 0 0 0 0 1h15Z"/></svg>
				Projetos
			</a>
			<a id="board">
				<svg width="16" height="16" fill="snow" class="bi bi-kanban-fill" viewBox="0 0 16 16"><path d="M2.5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11zm5 2h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm-5 1a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm9-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/></svg>
				Board
			</a>
			<a href="#">
				<svg width="16" height="16" fill="snow" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg>
				Configurações
			</a>
			<a href="{{ route('auth.logout') }}">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg>
				Sair
			</a>
		</nav>

		<aside>
			<div id="logo">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="snow" class="bi bi-kanban-fill" viewBox="0 0 16 16"><path d="M2.5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11zm5 2h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm-5 1a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm9-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1z"/></svg>
				KhanBan
			</div>
			<div class="group">
				<button>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel3-fill" viewBox="0 0 16 16"><path d="M8.5 12v1.134a1 1 0 1 1-1 0V12h-5A1.5 1.5 0 0 1 1 10.5V3h14v7.5a1.5 1.5 0 0 1-1.5 1.5h-5Zm7-10a.5.5 0 0 0 0-1H.5a.5.5 0 0 0 0 1h15Z"/></svg>
					Projetos
				</button>
				<ul>	
					<li><button id="criar-projeto">Criar Projeto</button></li>
					<li><a href="{{ route('projetos.index') }}"><button>Gerenciar</button></a></li>
				</ul>
			</div>
			
			<div class="group">
				<button>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
					Usuário
				</button>
				<ul>
					<li><button>Novo Usuário</button></li>
					<li><button>Ver Usuários</button></li>
				</ul>
			</div>
		</aside>

		<main>
			@yield('conteudo')
		</main>

		<footer>
			<p>Todos os direitos reservados: <a href="https://github.com/Scemist">github.com/Scemist</a>© - 2021</p>
		</footer>		

		@stack('scripts')
		<script>
			// Se a sessão acabou de ser criada (o usuario abriu a página agora)
			if (typeof(sessionStorage.pLoaded) == 'undefined') {
				// Se há localStoraged e se a versão é atualizada
				if (typeof(localStorage.pIndex) == 'undefined' || localStorage.pVersion < 1) {
					// Requisita o ternário atual
					localStorage.clear()
					// Requisita os ternários restantes
				} else {
					// Carrega o ternário atual
				}
			}

			const main = document.querySelector('main')
			const criarProjeto = document.querySelector('#criar-projeto')
			const board = document.querySelector('#board')
			const projetos = document.querySelector('#projetos')

			criarProjeto.addEventListener('click', () => { initPage('criar') })
			board.addEventListener('click', () => { initPage('board') })
			projetos.addEventListener('click', () => { initPage('lista') })

			const initPage = function (rota) {
				document.querySelectorAll('#fileScript').forEach(e => { e.remove() })
				let hasPage = (!localStorage.getItem(rota)) ? true : false
				let hasCss = (!localStorage.getItem(`${rota}Css`)) ? true : false
				let hasJs = (!localStorage.getItem(`${rota}Js`)) ? true : false
				getPage(rota, hasPage, hasCss, hasJs)
			}

			const getPage = function (rota, page, css, js) {
				if (page) {
					console.log('Requisitando página')
					fetch(`/projetos/${rota}/pulse`)
						.then(pagina => pagina.text())
						.then(pagina => { 
							getCss(pagina, css, rota, js) 
							localStorage.setItem(rota, pagina)
						})
				} else {
					console.log('Página local')
					getCss(localStorage.getItem(rota), css, rota, js)
				}
			}

			const getCss = function (page, css, rota, js) {
				if (css == true) {
					console.log('Requisitando CSS')
					fetch(`../css/${rota}.css`)
						.then(cssN => cssN.text())
						.then(cssN => { 
							loadPage(page, cssN, rota) 
							localStorage.setItem(`${rota}Css`, cssN)
						})
				} else {
					console.log('CSS local')
					loadPage(page, localStorage.getItem(`${rota}Css`), rota)
				}
			}

			const loadPage = function (page, css, rota, js) {
				document.querySelectorAll('style').forEach(e => { e.remove() })
				const style = document.createElement('style')
				style.textContent = css
				main.innerHTML = page
				window.history.pushState('page', 'Title', `/projetos/${rota}`)
				document.head.append(style)

				if (localStorage.getItem(`${rota}Js`)) {
					console.log('JS local')
					// eval(localStorage.getItem(`${rota}Js`))

					let script = document.createElement('script')
					script.setAttribute('id', 'fileScript')
					script.innerHTML = localStorage.getItem(`${rota}Js`)
					document.body.appendChild(script)
				} else {
					console.log(`/js/${rota}.js`)
					const xhr = new XMLHttpRequest()

					xhr.open('GET', `/js/${rota}.js`)
					xhr.setRequestHeader('Content-Type', 'applicattion/x-www-form-urlencoded')
					xhr.send()
					xhr.onreadystatechange = function() {
						if (xhr.readyState === 4) {
							if (xhr.status === 200) {
								let script = document.createElement('script')
								script.setAttribute('id', 'fileScript')
								script.innerHTML = xhr.responseText
								document.body.appendChild(script)						
							} else {
								console.log('No JS')
							}
						} 
					}
				}
			}
		</script>
	</body>
</html>