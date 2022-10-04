const tarefas = document.querySelectorAll('.tarefa')
const colunas = document.querySelectorAll('.coluna-body')
const rodapes = document.querySelectorAll('.coluna-footer')
const filtroEscuro = document.querySelector('#filter')
const adicionarTarefa = document.querySelectorAll('.add-tarefa')
const projetoId = document.querySelector('#projeto-id').textContent
const token = document.querySelector('main > input[name="_token"]').value

const taskMouseUp = tarefa => tarefa.classList.add('task-click-animated')
const taskMouseDown = tarefa => tarefa.classList.remove('task-click-animated')