/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/board.js ***!
  \*******************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var tarefas = document.querySelectorAll('.tarefa');
var colunasBody = document.querySelectorAll('.coluna-body');

var Kanboard = /*#__PURE__*/function () {
  function Kanboard() {
    _classCallCheck(this, Kanboard);
  }

  _createClass(Kanboard, null, [{
    key: "dragstart",
    value: function dragstart() {
      colunasBody.forEach(function (colunaBody) {
        return colunaBody.classList.add('highlight');
      });
      this.classList.add('is-dragging');
    }
  }, {
    key: "dragend",
    value: function dragend() {
      colunasBody.forEach(function (colunaBody) {
        return colunaBody.classList.remove('highlight');
      });
      this.classList.remove('is-dragging');
      Kanboard.reorderlist();
    }
  }, {
    key: "dragover",
    value: function dragover() {
      this.classList.add('over');
      var tarefaSendoArrastada = document.querySelector('.is-dragging');
      this.prepend(tarefaSendoArrastada);
    }
  }, {
    key: "dragleave",
    value: function dragleave() {
      this.classList.remove('over');
    }
  }, {
    key: "drop",
    value: function drop() {
      this.classList.remove('over');
    }
  }, {
    key: "reorderlist",
    value: function reorderlist() {
      colunasBody.forEach(function (coluna) {
        var count = 1;
        var tarefas = Array.from(coluna.children);
        tarefas.forEach(function (tarefa) {
          tarefa.setAttribute('data-position', count);
          count++;
        });
      });
    }
  }]);

  return Kanboard;
}();

tarefas.forEach(function (tarefa) {
  tarefa.addEventListener('dragstart', Kanboard.dragstart); // Acende a luz das colunas

  tarefa.addEventListener('dragend', Kanboard.dragend); // Apaga a luz das colunas
});
colunasBody.forEach(function (colunaBody) {
  colunaBody.addEventListener('dragover', Kanboard.dragover); // Realça a coluna atual

  colunaBody.addEventListener('dragleave', Kanboard.dragleave); // Tira o realce da coluna atual

  colunaBody.addEventListener('drop', Kanboard.drop); // Tira o realce da coluna atual
});
/******/ })()
;