
rodapes.forEach(rodape => 
	rodape.addEventListener('dragenter', Kanban.rodapeDragenter)
)

tarefas.forEach(tarefa => {
	tarefa.addEventListener('dragenter', Kanban.tarefaDragenter)
	tarefa.addEventListener('dragstart', Kanban.tarefaDragstart)
	tarefa.addEventListener('dragend', _ => Kanban.tarefaDragend(tarefa))

	tarefa.addEventListener('click', _ => Modal.openTask(tarefa))

	tarefa.addEventListener('mousedown', _ => taskMouseUp(tarefa))
	tarefa.addEventListener('mouseup', _ => taskMouseDown(tarefa))
	tarefa.addEventListener('dragend', _ => taskMouseDown(tarefa))
})

filtroEscuro.addEventListener('click', Modal.close)

adicionarTarefa.forEach(coluna => 
	coluna.addEventListener('click', _ => Modal.openTaskForm(coluna))
)