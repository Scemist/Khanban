const tarefas = document.querySelectorAll('.tarefa')
const colunasBody = document.querySelectorAll('.coluna-body')

tarefas.forEach(tarefa => {
	tarefa.addEventListener('dragstart', dragstart)
	tarefa.addEventListener('dragend', dragend)
})

function dragstart() {
	colunasBody.forEach(colunaBody => colunaBody.classList.add('highlight'))
	this.classList.add('is-dragging')
}

function dragend() {
	colunasBody.forEach(colunaBody => colunaBody.classList.remove('highlight'))
	this.classList.remove('is-dragging')
}

colunasBody.forEach(colunaBody => {
	colunaBody.addEventListener('dragover', dragover)
	colunaBody.addEventListener('dragleave', dragleave)
	colunaBody.addEventListener('drop', drop)
})

function dragover() {
	this.classList.add('over')
	const tarefaSendoArrastada = document.querySelector('.is-dragging')
	this.appendChild(tarefaSendoArrastada)
}

function dragleave() {
	this.classList.remove('over')
}

function drop() {
	this.classList.remove('over')
}