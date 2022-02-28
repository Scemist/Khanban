@extends('templates/project-template')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/board.css') }}">
@endpush

@push('scripts')
	<script src="{{ asset('js/board.js') }}"></script>
@endpush

@section('conteudo')
<section>
	<article>
		<div class="coluna-head">
			<label for="aguardando" id="aguardando">Aguardando Início</label>
			<div class="add-tarefa">
				<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
				<div>Adicionar tarefa</div>
			</div>
		</div>

		<div class="coluna-body">
			<div class="tarefa" draggable="true" data-position="1">
				<div class="nome">Criação da Index para que vos possam fazer mais</div>
				<div class="prioridade"><svg fill="#DB3E34" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/></svg></div>
				<div class="verificar"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>07/02</div>
				<div class="termino"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>15/02</div>
				<div class="etiqueta"><span>Etiqueta</span></div>
				<div class="categoria"><span>Categoria</span></div>
				<div class="designado"><img class="perfil" src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2lsaG91ZXR0ZXxlbnwwfHwwfHw%3D&w=300" alt="\o/"></div>
			</div>
			
			<div class="coluna-footer"></div>
		</div>
	</article>
	
	<article>
		<div class="coluna-head">
			<label for="tarefa" id="andamento">Em Andamento</label>
			<div class="add-tarefa">
				<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
				<div>Adicionar tarefa</div>
			</div>
		</div>

		<div class="coluna-body">
			<div class="tarefa" draggable="true" data-position="1">
				<div class="nome">Estilização da Página Sobre</div>
				<div class="prioridade"><svg fill="#009990" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg></div>
				<div class="verificar"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>07/02</div>
				<div class="termino"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>15/02</div>
				<div class="etiqueta"><span>Etiqueta</span></div>
				<div class="categoria"></div>
				<div class="designado"><img class="perfil" src="https://images.unsplash.com/photo-1608155686393-8fdd966d784d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y3JlYXRpdmUlMjBwcm9maWxlfGVufDB8fDB8fA%3D%3D&w=300" alt="\o/"></div>
			</div>

			<div class="coluna-footer"></div>
		</div>
	</article>
	
	<article>
		<div class="coluna-head">
			<label for="tarefa" id="concluido">Concluído</label>
			<div class="add-tarefa">
				<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
				<div>Adicionar tarefa</div>
			</div>
		</div>

		<div class="coluna-body">
			<div class="tarefa" draggable="true" data-position="1">
				<div class="nome">Organizar o DER (Banco Principal)</div>
				<div class="prioridade"></div>
				<div class="verificar"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>07/02</div>
				<div class="termino"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>15/02</div>
				<div class="etiqueta"></div>
				<div class="categoria"><span>Categoria</span></div>
				<div class="designado"><img class="perfil" src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2lsaG91ZXR0ZXxlbnwwfHwwfHw%3D&w=300" alt="\o/"></div>
			</div>
	
			<div class="tarefa" draggable="true" data-position="2">
				<div class="nome">Iniciar o Controller do Projeto</div>
				<div class="prioridade"><svg fill="#009990" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg></div>
				<div class="verificar"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>07/02</div>
				<div class="termino"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>15/02</div>
				<div class="etiqueta"></div>
				<div class="categoria"></div>
				<div class="designado"><img class="perfil" src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2lsaG91ZXR0ZXxlbnwwfHwwfHw%3D&w=300" alt="\o/"></div>
			</div>

			<div class="coluna-footer"></div>
		</div>
	</article>
	
	<article>
		<div class="coluna-head">
			<label for="tarefa" id="espera">Em Espera</label>
			<div class="add-tarefa">
				<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
				<div>Adicionar tarefa</div>
			</div>
		</div>

		<div class="coluna-body">
			<div class="tarefa" draggable="true" data-position="1">
				<div class="nome">Backup da Semana</div>
				<div class="prioridade"><svg fill="#009990" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/></svg></div>
				<div class="verificar"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>07/02</div>
				<div class="termino"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>15/02</div>
				<div class="etiqueta"></div>
				<div class="categoria"></div>
				<div class="designado"><img class="perfil" src="https://images.unsplash.com/photo-1608155686393-8fdd966d784d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y3JlYXRpdmUlMjBwcm9maWxlfGVufDB8fDB8fA%3D%3D&w=300" alt="\o/"></div>
			</div>

			<div class="coluna-footer"></div>
		</div>
	</article>
	
	<article>
		<div class="coluna-head">
			<label for="tarefa" id="cancelado">Cancelado</label>
			<div class="add-tarefa">
				<svg width="25" height="25" fill="currentColor" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
				<div>Adicionar tarefa</div>
			</div>
		</div>

		<div class="coluna-body">		
			<div class="tarefa" draggable="true" data-position="1">
				<div class="nome">Iniciar Ferramenta de Busca</div>
				<div class="prioridade"></div>
				<div class="verificar"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>07/02</div>
				<div class="termino"><svg width="16" height="16" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/><path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>15/02</div>
				<div class="etiqueta"><span>Etiqueta</span></div>
				<div class="categoria"><span>Categoria</span></div>
				<div class="designado"><img class="perfil" src="https://images.unsplash.com/photo-1608155686393-8fdd966d784d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y3JlYXRpdmUlMjBwcm9maWxlfGVufDB8fDB8fA%3D%3D&w=300" alt="\o/"></div>
			</div>
		
			<div class="coluna-footer"></div>
		</div>
	</article>
</section>

<template id="task-box">
	<div id="task-modal-container">
		<header>
			<div class="head head-1">
				<div>
					<h2 id="task-title">Solicitação Provinda de Cliente</h2>	
				</div>
				<div class="items-group x">
					<div><span>Etiqueta</span></div>
					<div><span>Categoria</span></div>
				</div>
			</div>
			<hr>
			
			<div class="head head-2">
				<div class="items-group y">
					<p>
						<b>Lucas Gonçalves</b>
						<small> como designado.</small>
					</p>
					<input type="text" id="referencia" value="Email de 2022 às 23:54">
				</div>

				<div class="items-group y">
					<div class="items-group x">
						Check-in
						<input type="date" value="2022-02-26">
					</div>
					<div class="items-group x">
						Vencimento
						<input type="date" value="2022-03-03">
					</div>
				</div>
			</div>
		</header>
		<hr>

		<div id="subtasks">
			<div class="icon-group">
				<input type="checkbox">
				<label>A lorem ipsum subtask</label>
			</div>
			<div class="icon-group">
				<input type="checkbox">
				<label>Alahu akbar</label>
			</div>
			<div class="icon-group">
				<input type="checkbox">
				<label>Ukranian test</label>
			</div>
		</div>
		<hr>

		<div>
			<legend><strong>Descrição</strong></legend>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus molestias aspernatur at aut? Consequuntur, deleniti fugiat rem molestiae animi cupiditate neque perspiciatis praesentium illum nisi consectetur est impedit ad rerum, necessitatibus repellat dolorem quam.</p>
			<p>If is that Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam totam accusamus culpa!</p>
		</div>
		<hr>

		<div id="details">
			<small>Criado por Lucas Gonçalves em 02 de maio 2021</small>
			<button>Ações da Tarefa</button>
		</div>
		<hr>

		<div id="comments">
			<div class="comment-container">
				<div class="comment-head">
					<b>Lucas Gonçalves</b> 
					<small> 22 de fevereiro de 2021 às 12:23</small>
					<div class="comment-menu">
						<a>Editar</a>
					</div>
				</div>
				<div class="comment-body">
					<p>
						Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet velit in adipisci.
					</p>
				</div>
			</div>

			<div class="comment-container">
				<div class="comment-head">
					<b>John Ruddley</b> 
					<small> 13 de fevereiro de 2021 às 16:30</small>
					<div class="comment-menu">
						<a>Editar</a>
					</div>
				</div>
				<div class="comment-body">
					<p>
						Ipsum dolor sit amet consectetur.<br>
						<b>Alahu Akbar</b>
					</p>
				</div>
			</div>
		</div>
	</div>
</template>
@stop