/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/board.js ***!
  \*******************************/
var tarefas = document.querySelectorAll('.tarefa');
var colunasBody = document.querySelectorAll('.coluna-body');
tarefas.forEach(function (tarefa) {
  tarefa.addEventListener('dragstart', dragstart); // tarefa.addEventListener('drag', drag)

  tarefa.addEventListener('dragend', dragend);
});

function dragstart() {
  colunasBody.forEach(function (colunaBody) {
    return colunaBody.classList.add('highlight');
  });
  this.classList.add('is-dragging');
}

function dragend() {
  colunasBody.forEach(function (colunaBody) {
    return colunaBody.classList.remove('highlight');
  });
  this.classList.remove('is-dragging');
}
/* Aloha Moon */


colunasBody.forEach(function (colunaBody) {
  // colunaBody.addEventListener('dragenter', dragenter)
  colunaBody.addEventListener('dragover', dragover);
  colunaBody.addEventListener('dragleave', dragleave);
  colunaBody.addEventListener('drop', drop);
});

function dragover() {
  this.classList.add('over');
  var tarefaSendoArrastada = document.querySelector('.is-dragging');
  this.appendChild(tarefaSendoArrastada);
}

function dragleave() {
  this.classList.remove('over');
}

function drop() {
  this.classList.remove('over');
}
/******/ })()
;