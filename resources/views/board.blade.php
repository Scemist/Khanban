@extends('templates/index')

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/board.css') }}">
@endpush

@section('conteudo')
	<section>
		<article>
			<div class="coluna-head">
				<label for="aguardando" id="aguardando">Aguardando Início</label>
				<div class="add-tarefa">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
					<div>Adicionar tarefa</div>
				</div>
			</div>

			<div class="coluna-body">
				<div class="tarefa" draggable="true">
					<div class="nome">Criação da Index</div>
					<div class="data">15/12</div>
				</div>
			</div>
		</article>
		
		<article>
			<div class="coluna-head">
				<label for="tarefa" id="andamento">Em Andamento</label>
				<div class="add-tarefa">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
					<div>Adicionar tarefa</div>
				</div>
			</div>

			<div class="coluna-body">
				<div class="tarefa" draggable="true">
					<div class="nome">Estilização da Página Sobre</div>
					<div class="data">15/12</div>
				</div>
			</div>
		</article>
		
		<article>
			<div class="coluna-head">
				<label for="tarefa" id="concluido">Concluído</label>
				<div class="add-tarefa">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
					<div>Adicionar tarefa</div>
				</div>
			</div>

			<div class="coluna-body">
				<div class="tarefa" draggable="true">
					<div class="nome">Organizar o DER (Banco Principal)</div>
					<div class="data">15/12</div>
				</div>
				<div class="tarefa" draggable="true">
					<div class="nome">Iniciar o Controller do Projeto</div>
					<div class="data">15/12</div>
				</div>
			</div>
		</article>
		
		<article>
			<div class="coluna-head">
				<label for="tarefa" id="espera">Em Espera</label>
				<div class="add-tarefa">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
					<div>Adicionar tarefa</div>
				</div>
			</div>

			<div class="coluna-body">
				<div class="tarefa" draggable="true">
					<div class="nome">Backup da Semana</div>
					<div class="data">14/12</div>
				</div>
			</div>
		</article>
		
		<article>
			<div class="coluna-head">
				<label for="tarefa" id="cancelado">Cancelado</label>
				<div class="add-tarefa">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/></svg>
					<div>Adicionar tarefa</div>
				</div>
			</div>

			<div class="coluna-body">
				<div class="tarefa" draggable="true">
					<div class="nome">Iniciar Ferramenta de Busca</div>
					<div class="data">23/11</div>
				</div>
			</div>
		</article>
	</section>
@stop