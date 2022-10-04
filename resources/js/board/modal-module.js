class Modal {
	static openTask = tarefa => {
		Modal.open('#task-modal-template')
		Ajax.getTaskData(tarefa)
	}

	static openTaskForm = coluna => {
		Modal.open('#task-form-modal-template')
		document.querySelector('input[name=coluna]').value = coluna.getAttribute('data-column')
	}

	static open = (templateModalId) => {
		const taskModalTemplate = document.querySelector(templateModalId)
		const modalTask = taskModalTemplate.content.cloneNode(true)

		document.querySelectorAll('body > *').forEach(tag => tag.classList.add('blur'))
		document.querySelector('#filter').classList.add('filter')
		document.querySelector('body').appendChild(modalTask)
			
		if (document.querySelectorAll('.above-menu').length > 0)
			AboveMenu.addListener()
	}

	static close = _ => {
		document.querySelectorAll('body > *').forEach(tag => tag.classList.remove('blur'))
		filtroEscuro.classList.remove('filter')
		document.querySelector('.modal-container').remove()
	}
}