/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/board.js ***!
  \*******************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var tarefas = document.querySelectorAll('.tarefa');
var colunas = document.querySelectorAll('.coluna-body');
var rodapes = document.querySelectorAll('.coluna-footer');

var Kanban = /*#__PURE__*/function () {
  function Kanban() {
    _classCallCheck(this, Kanban);
  }

  _createClass(Kanban, null, [{
    key: "rodapeDragover",
    value: function rodapeDragover() {
      var tarefaSendoArrastada = document.querySelector('.is-dragging');
      this.before(tarefaSendoArrastada);
    }
  }, {
    key: "colunaDragover",
    value: function colunaDragover() {
      this.classList.add('over');
    }
  }, {
    key: "colunaDragleave",
    value: function colunaDragleave() {
      this.classList.remove('over');
    }
  }, {
    key: "tarefaDragover",
    value: function tarefaDragover() {
      var tarefaSendoArrastada = document.querySelector('.is-dragging');

      if (tarefaSendoArrastada.getAttribute('data-position') > this.getAttribute('data-position')) {
        this.before(tarefaSendoArrastada);
      } else {
        this.after(tarefaSendoArrastada);
      }

      Kanban.reorderIndex();
    }
  }, {
    key: "tarefaDragstart",
    value: function tarefaDragstart() {
      this.classList.add('is-dragging');
      colunas.forEach(function (coluna) {
        return coluna.classList.add('highlight');
      });
    }
  }, {
    key: "tarefaDragend",
    value: function tarefaDragend() {
      this.classList.remove('is-dragging');
      colunas.forEach(function (coluna) {
        return coluna.classList.remove('highlight');
      });
    }
  }, {
    key: "reorderIndex",
    value: function reorderIndex() {
      colunas.forEach(function (coluna) {
        var count = 1;
        var tarefas = Array.from(coluna.children);
        tarefas.forEach(function (tarefa) {
          tarefa.setAttribute('data-position', count);
          count++;
        });
      });
    }
  }]);

  return Kanban;
}();

rodapes.forEach(function (rodape) {
  return rodape.addEventListener('dragover', Kanban.rodapeDragover);
});
colunas.forEach(function (coluna) {
  coluna.addEventListener('dragover', Kanban.colunaDragover);
  coluna.addEventListener('dragleave', Kanban.colunaDragleave);
});
tarefas.forEach(function (tarefa) {
  tarefa.addEventListener('dragover', Kanban.tarefaDragover);
  tarefa.addEventListener('dragstart', Kanban.tarefaDragstart);
  tarefa.addEventListener('dragend', Kanban.tarefaDragend);
});
/******/ })()
;