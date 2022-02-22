/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/board.js ***!
  \*******************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

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

openTaskModal = function openTaskModal(_) {
  var taskModalTemplate = document.querySelector('template');
  var modalTask = taskModalTemplate.content.cloneNode(true);
  document.querySelector('body').appendChild(modalTask);
  document.querySelectorAll('body > *').forEach(function (tag) {
    return tag.classList.toggle('blur');
  });
  document.querySelector('#filter').classList.add('filter');
  loadSubtask();
};

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
  tarefa.addEventListener('click', function (_) {
    return openTaskModal();
  });
});
document.querySelector('#filter').addEventListener('click', function (_) {
  document.querySelectorAll('body > *').forEach(function (tag) {
    return tag.classList.remove('blur');
  });
  document.querySelector('#filter').classList.remove('filter');
  document.querySelector('#task-modal-container').remove();
});

function loadSubtask() {
  document.querySelectorAll('.check-svg-group').forEach(function (grupo) {
    grupo.addEventListener('click', function (_) {
      function change(posicao) {
        var _iterator = _createForOfIteratorHelper(grupo.children),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var circle = _step.value;
            circle.dataset.value = 0;
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }

        if (posicao == 2) {
          grupo.children[0].dataset.value = 1;
          return true;
        }

        posicao++;
        grupo.children[posicao].dataset.value = 1;
      }

      switch (true) {
        case grupo.children[0].dataset.value == 1:
          change('0');
          break;

        case grupo.children[1].dataset.value == 1:
          change('1');
          break;

        case grupo.children[2].dataset.value == 1:
          change('2');
          break;
      }
    });
  });
}
/******/ })()
;