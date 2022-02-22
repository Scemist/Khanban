const tarefas = document.querySelectorAll('.tarefa')
const colunas = document.querySelectorAll('.coluna-body')
const rodapes = document.querySelectorAll('.coluna-footer')

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
	static tarefaDragend() { 
		this.classList.remove('is-dragging')
		colunas.forEach(coluna => coluna.classList.remove('highlight'))
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

openTaskModal = _ => {
	const taskModalTemplate = document.querySelector('template')
	const modalTask = taskModalTemplate.content.cloneNode(true)
	document.querySelector('body').appendChild(modalTask)

	document.querySelectorAll('body > *').forEach(tag => tag.classList.toggle('blur'))
	document.querySelector('#filter').classList.add('filter')

	loadSubtask()
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
	tarefa.addEventListener('dragend', Kanban.tarefaDragend)

	tarefa.addEventListener('click', _ => openTaskModal())
})

document.querySelector('#filter').addEventListener('click', _ => {
	document.querySelectorAll('body > *').forEach(tag => tag.classList.remove('blur'))
	document.querySelector('#filter').classList.remove('filter')
	document.querySelector('#task-modal-container').remove()
})

function loadSubtask() {
	document.querySelectorAll('.check-svg-group').forEach(grupo => {
		grupo.addEventListener('click', _ => {
			function change(posicao) {
				for (let circle of grupo.children)
					circle.dataset.value = 0 
				if (posicao == 2) {
					grupo.children[0].dataset.value = 1
					return true
				}
				posicao++
				grupo.children[posicao].dataset.value = 1
			}

			switch (true) {
				case grupo.children[0].dataset.value == 1:
					change('0')
				break;
				case grupo.children[1].dataset.value == 1:
					change('1')
				break;
				case grupo.children[2].dataset.value == 1:
					change('2')
				break;
			}
		})
	}) 
}