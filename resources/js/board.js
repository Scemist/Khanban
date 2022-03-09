const tarefas = document.querySelectorAll('.tarefa')
const colunas = document.querySelectorAll('.coluna-body')
const rodapes = document.querySelectorAll('.coluna-footer')
const filtroEscuro = document.querySelector('#filter')
const adicionarTarefa = document.querySelectorAll('.add-tarefa')

class Kanban {
	static rodapeDragenter() {
		const tarefaSendoArrastada = document.querySelector('.is-dragging')
		this.before(tarefaSendoArrastada)
	}
	static colunaDragenter() {
		this.classList.add('over')
		console.log(123);
	}
	static colunaDragleave() {
		this.classList.remove('over')
	}
	static colunaDragend() {
		colunas.forEach(coluna => coluna.classList.remove('over'))
	}
	static tarefaDragenter() {
		const tarefaSendoArrastada = document.querySelector('.is-dragging')

		if (this != tarefaSendoArrastada) { 
			// Se ele só não entrou nele mesmo)
			if (tarefaSendoArrastada.parentNode.parentNode.getAttribute('data-column') != this.parentNode.parentNode.getAttribute('data-column')) {
				// Se a coluna for diferente, insere before do que entrou e mata o problema
				this.before(tarefaSendoArrastada)
				Kanban.reorderIndex()
			} else {
				// Se a coluna for igual, verifíca 
				if (tarefaSendoArrastada.getAttribute('data-position') < this.getAttribute('data-position')) {
					this.after(tarefaSendoArrastada)
				} else {
					this.before(tarefaSendoArrastada)
				}
				Kanban.reorderIndex()
			}
		}
	}
	static tarefaDragstart() { 
		this.classList.add('is-dragging')
		colunas.forEach(coluna => coluna.classList.add('highlight'))
	}
	static tarefaDragend(tarefa) { 
		colunas.forEach(coluna => coluna.classList.remove('highlight'))
		tarefa.classList.remove('is-dragging')
		Kanban.reorderIndex()

		// const coluna = tarefa.parentNode.parentNode.getAttribute('data-column')
		// const tarefaId = tarefa.getAttribute('data-id')
		Ajax.saveTasksPosition()
	}
	static reorderIndex() {
		colunas.forEach(coluna => {
			let count = 1
			const tarefas = Array.from(coluna.children)
			tarefas.forEach(tarefa => {
				tarefa.setAttribute('data-position' , count)
				count++
			})
		})
	}
}

class Modal {
	static openTask = _ =>
		Modal.open('#task-modal-template')

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

class AboveMenu {
	static addListener = _ => {
		document.querySelectorAll('.above-menu').forEach(aboveMenu => {
			const aboveBotao = aboveMenu.querySelector('button')
			aboveBotao.addEventListener('click', _ => AboveMenu.toggleVisible(aboveMenu))
		})
	}

	static toggleVisible = element =>
		element.querySelector('.menu').classList.toggle('visivel')
}

class Ajax {
	static saveTasksPosition = _ =>
		console.log('Saving...');
}

rodapes.forEach(rodape => 
	rodape.addEventListener('dragenter', Kanban.rodapeDragenter)
)

colunas.forEach(coluna => {
	// coluna.addEventListener('dragenter', Kanban.colunaDragenter)
	// coluna.addEventListener('dragleave', Kanban.colunaDragleave)
})

tarefas.forEach(tarefa => {
	tarefa.addEventListener('dragenter', Kanban.tarefaDragenter)
	tarefa.addEventListener('dragstart', Kanban.tarefaDragstart)
	tarefa.addEventListener('dragend', _ => Kanban.tarefaDragend(tarefa))

	tarefa.addEventListener('click', Modal.openTask)
})

filtroEscuro.addEventListener('click', Modal.close)

adicionarTarefa.forEach(coluna => 
	coluna.addEventListener('click', _ => Modal.openTaskForm(coluna))
)