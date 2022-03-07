<div class="modal-container" id="task-form-modal">
	<header>
		<h2>Criar Tarefa</h2>
	</header>
	<hr>

	<main>
		<form action="{{ route('tasks.store') }}" method="POST">
			@csrf
			<input type="hidden" name="projetoId" value="{{ $project->id }}">
			<input type="hidden" name="coluna">
			
			<fieldset>
				<label>Título</label>
				<input type="text" name="titulo" required>
			</fieldset>

			<fieldset>
				<label>Referência</label>
				<input type="text" name="referencia">
			</fieldset>

			<fieldset>
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

			<fieldset>
				<label>Categoria</label>
				<select name="categoria">
					<option></option>
					<option value="453">Humanas</option>
					<option value="626">Exatas</option>
					<option value="654">Abstrato</option>
				</select>
			</fieldset>

			<fieldset>
				<label>Etiqueta</label>
				<input type="text" name="etiqueta" id="">
			</fieldset>

			<fieldset>
				<label>Designado</label>
				<select name="designado">
					<option></option>
					@foreach ($users as $user)
						<option value="{{ $user->id }}">{{ $user->name }}
					@endforeach
				</select>
			</fieldset>

			<fieldset>
				<label>Descrição</label>
				<textarea name="descricao" rows="5"></textarea>
			</fieldset>
			
			<input type="submit" class="btn blue">
		</form>
	</main>
</div>