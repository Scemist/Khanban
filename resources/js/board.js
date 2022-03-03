const tarefas = document.querySelectorAll('.tarefa')
const colunas = document.querySelectorAll('.coluna-body')
const rodapes = document.querySelectorAll('.coluna-footer')
const filtroEscuro = document.querySelector('#filter')
const adicionarTarefa = document.querySelectorAll('.add-tarefa')

class Kanban {
	static rodapeDragover() {
		const tarefaSendoArrastada = document.querySelector('.is-dragging')
		this.before(tarefaSendoArrastada)
	}
	static colunaDragover() {
		this.classList.add('over')
	}
	static colunaDragleave() {
		this.classList.remove('over')
	}
	static tarefaDragover() { 
		const tarefaSendoArrastada = document.querySelector('.is-dragging')
		
		if(tarefaSendoArrastada.getAttribute('data-position') > this.getAttribute('data-position')) {
			this.before(tarefaSendoArrastada)
		} else {
			this.after(tarefaSendoArrastada)
		}

		Kanban.reorderIndex()
	}
	static tarefaDragstart() { 
		this.classList.add('is-dragging')
		colunas.forEach(coluna => coluna.classList.add('highlight'))
	}
	static tarefaDragend(tarefa) { 
		colunas.forEach(coluna => coluna.classList.remove('highlight'))
		tarefa.classList.remove('is-dragging')

		const coluna = tarefa.parentNode.parentNode.getAttribute('data-column')
		const tarefaId = tarefa.getAttribute('data-id')
		console.log(tarefaId)
		// Ajax.request(coluna, tarefaId)
	}
	static reorderIndex() {
		colunas.forEach(coluna => {
			let count = 1
			let tarefas = Array.from(coluna.children)
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
		// console.log(coluna.getAttribute('data-column'))
		document.querySelector('input[name=coluna]').value = coluna.getAttribute('data-column')
	}

	static open = templateModalId => {
		const taskModalTemplate = document.querySelector(templateModalId)
		const modalTask = taskModalTemplate.content.cloneNode(true)

		document.querySelectorAll('body > *').forEach(tag => tag.classList.add('blur'))
		document.querySelector('#filter').classList.add('filter')
		document.querySelector('body').appendChild(modalTask)
	}

	static close = _ => {
		document.querySelectorAll('body > *').forEach(tag => tag.classList.remove('blur'))
		filtroEscuro.classList.remove('filter')
		document.querySelector('.modal-container').remove()
	}
}

rodapes.forEach(rodape => 
	rodape.addEventListener('dragover', Kanban.rodapeDragover)
)

colunas.forEach(coluna => {
	coluna.addEventListener('dragover', Kanban.colunaDragover)
	coluna.addEventListener('dragleave', Kanban.colunaDragleave)	
})

tarefas.forEach(tarefa => {
	tarefa.addEventListener('dragover', Kanban.tarefaDragover)
	tarefa.addEventListener('dragstart', Kanban.tarefaDragstart)
	tarefa.addEventListener('dragend', _ => Kanban.tarefaDragend(tarefa))

	tarefa.addEventListener('click', Modal.openTask)
})

filtroEscuro.addEventListener('click', Modal.close)

adicionarTarefa.forEach(coluna => 
	coluna.addEventListener('click', _ => Modal.openTaskForm(coluna))
)