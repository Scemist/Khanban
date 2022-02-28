<div class="modal-container" id="task-form-modal">
	<header>
		<h2>Criar Tarefa</h2>
	</header>
	<hr>

	<main>
		<form action="{{ route('tasks.store') }}" method="POST">
			@csrf
			<fieldset>
				<label>Título</label>
				<input type="text">
			</fieldset>

			<fieldset>
				<label>Referência</label>
				<input type="text">
			</fieldset>

			<fieldset>
				<label>Cor</label>
				<input type="color">
			</fieldset>

			<fieldset>
				<label>Categoria</label>
				<select name="designado">
					<option value="453">Humanas</option>
					<option value="626">Exatas</option>
					<option value="654">Abstrato</option>
				</select>
			</fieldset>

			<fieldset>
				<label>Etiqueta</label>
				<input type="text" name="" id="">
			</fieldset>

			<fieldset>
				<label>Descrição</label>
				<textarea name="descricao" rows="5"></textarea>
			</fieldset>

			<fieldset>
				<label>Designado</label>
				<select name="designado">
					<option value="123">Nietszche</option>
					<option value="746">Vladimir</option>
					<option value="365">Dmitri</option>
				</select>
			</fieldset>

			<input type="submit">
		</form>
	</main>
</div>