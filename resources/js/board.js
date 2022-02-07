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
})