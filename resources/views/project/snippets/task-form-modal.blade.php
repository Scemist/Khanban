<div class="modal-container open-task-animated" id="task-form-modal">
	<header>
		<h2>Criar Tarefa</h2>
	</header>
	<hr>

	<main>
		<form action="{{ route('tasks.store') }}" method="POST">
			@csrf
			<input type="hidden" name="projetoId" value="{{ $project->id }}">
			<input type="hidden" name="coluna">
			
			<fieldset class="titulo">
				<label>Título</label>
				<input type="text" name="titulo" required>
			</fieldset>

			
			<fieldset class="cor">
				<label>Cor</label>
				<select name="cor">
					<option>Branco</option>
					<option value="azul">Azul</option>
					<option value="vermelho">Vermelho</option>
					<option value="verde">Verde</option>
					<option value="amarelo">Amarelo</option>
					<option value="rosa">Rosa</option>
					<option value="roxo">Roxo</option>
				</select>
			</fieldset>

			<fieldset class="descricao">
				<label>Descrição</label>
				<textarea name="descricao" rows="5"></textarea>
			</fieldset>

			<fieldset class="categoria">
				<label>Categoria</label>
				<select name="categoria">
					<option></option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->title }}</option>
					@endforeach
				</select>
			</fieldset>

			<fieldset class="etiqueta">
				<label>Etiqueta</label>
				<input type="text" name="etiqueta" id="">
			</fieldset>

			<fieldset class="designado">
				<label>Designado</label>
				<select name="designado">
					<option></option>
					@foreach ($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}</option>
					@endforeach
				</select>
			</fieldset>

			<fieldset class="referencia">
				<label>Referência</label>
				<input type="text" name="referencia">
			</fieldset>


			<fieldset class="evento">
				<label>Data do evento</label>
				<input type="date" name="evento">
			</fieldset>

			<fieldset class="vencimento">
				<label>Vencimento</label>
				<input type="date" name="vencimento">
			</fieldset>

			<div class="enviar">
				<input type="submit" class="btn blue">
			</div>
		</form>
	</main>
</div>