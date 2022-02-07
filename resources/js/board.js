const tarefas = document.querySelectorAll('.tarefa')
const colunasBody = document.querySelectorAll('.coluna-body')

class Kanboard {
	static dragstart() {
		colunasBody.forEach(colunaBody => colunaBody.classList.add('highlight'))
		this.classList.add('is-dragging')
	}
	static dragend() {
		colunasBody.forEach(colunaBody => colunaBody.classList.remove('highlight'))
		this.classList.remove('is-dragging')
		Kanboard.reorderlist()
	}
	static dragover() {
		this.classList.add('over')
		const tarefaSendoArrastada = document.querySelector('.is-dragging')
		this.prepend(tarefaSendoArrastada)
	}
	static dragleave() {
		this.classList.remove('over')
	}
	static drop() {
		this.classList.remove('over')
	}
	static reorderlist() {
		colunasBody.forEach(coluna => {
			let count = 1
			let tarefas = Array.from(coluna.children)
			tarefas.forEach(tarefa => {
				tarefa.setAttribute('data-position' , count)
				count++
			})
		})
	}
}

tarefas.forEach(tarefa => {
	tarefa.addEventListener('dragstart', Kanboard.dragstart) // Acende a luz das colunas
	tarefa.addEventListener('dragend', Kanboard.dragend) // Apaga a luz das colunas
})

colunasBody.forEach(colunaBody => {
	colunaBody.addEventListener('dragover', Kanboard.dragover) // Realça a coluna atual
	colunaBody.addEventListener('dragleave', Kanboard.dragleave) // Tira o realce da coluna atual
	colunaBody.addEventListener('drop', Kanboard.drop) // Tira o realce da coluna atual
})