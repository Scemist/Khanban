function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var tarefas = document.querySelectorAll('.tarefa');
var colunas = document.querySelectorAll('.coluna-body');
var rodapes = document.querySelectorAll('.coluna-footer');
var filtroEscuro = document.querySelector('#filter');
var adicionarTarefa = document.querySelectorAll('.add-tarefa');
var projetoId = document.querySelector('#projeto-id').textContent;
var token = document.querySelector('main > input[name="_token"]').value;

var taskMouseUp = function taskMouseUp(tarefa) {
  return tarefa.classList.add('task-click-animated');
};

var taskMouseDown = function taskMouseDown(tarefa) {
  return tarefa.classList.remove('task-click-animated');
};

var Kanban = /*#__PURE__*/function () {
  function Kanban() {
    _classCallCheck(this, Kanban);
  }

  _createClass(Kanban, null, [{
    key: "rodapeDragenter",
    value: function rodapeDragenter() {
      var tarefaSendoArrastada = document.querySelector('.is-dragging');
      this.before(tarefaSendoArrastada);
    }
  }, {
    key: "colunaDragenter",
    value: function colunaDragenter() {
      this.classList.add('over');
      console.log(123);
    }
  }, {
    key: "colunaDragleave",
    value: function colunaDragleave() {
      this.classList.remove('over');
    }
  }, {
    key: "colunaDragend",
    value: function colunaDragend() {
      colunas.forEach(function (coluna) {
        return coluna.classList.remove('over');
      });
    }
  }, {
    key: "tarefaDragenter",
    value: function tarefaDragenter() {
      var tarefaSendoArrastada = document.querySelector('.is-dragging');

      if (this != tarefaSendoArrastada) {
        // Se ele só não entrou nele mesmo)
        if (tarefaSendoArrastada.parentNode.parentNode.getAttribute('data-column-id') != this.parentNode.parentNode.getAttribute('data-column-id')) {
          // Se a coluna for diferente, insere before do que entrou e mata o problema
          this.before(tarefaSendoArrastada);
          Kanban.reorderIndex();
        } else {
          // Se a coluna for igual, verifíca 
          if (Number(tarefaSendoArrastada.getAttribute('data-position')) < Number(this.getAttribute('data-position'))) {
            this.after(tarefaSendoArrastada);
          } else {
            this.before(tarefaSendoArrastada);
          }

          Kanban.reorderIndex();
        }
      }
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
    value: function tarefaDragend(tarefa) {
      colunas.forEach(function (coluna) {
        return coluna.classList.remove('highlight');
      });
      tarefa.classList.remove('is-dragging');
      Kanban.reorderIndex(); // const coluna = tarefa.parentNode.parentNode.getAttribute('data-column')
      // const tarefaId = tarefa.getAttribute('data-id')

      Ajax.saveTasksPosition();
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

var Modal = /*#__PURE__*/_createClass(function Modal() {
  _classCallCheck(this, Modal);
});

_defineProperty(Modal, "openTask", function (tarefa) {
  Modal.open('#task-modal-template');
  Ajax.getTaskData(tarefa);
});

_defineProperty(Modal, "openTaskForm", function (coluna) {
  Modal.open('#task-form-modal-template');
  document.querySelector('input[name=coluna]').value = coluna.getAttribute('data-column');
});

_defineProperty(Modal, "open", function (templateModalId) {
  var taskModalTemplate = document.querySelector(templateModalId);
  var modalTask = taskModalTemplate.content.cloneNode(true);
  document.querySelectorAll('body > *').forEach(function (tag) {
    return tag.classList.add('blur');
  });
  document.querySelector('#filter').classList.add('filter');
  document.querySelector('body').appendChild(modalTask);
  if (document.querySelectorAll('.above-menu').length > 0) AboveMenu.addListener();
});

_defineProperty(Modal, "close", function (_) {
  document.querySelectorAll('body > *').forEach(function (tag) {
    return tag.classList.remove('blur');
  });
  filtroEscuro.classList.remove('filter');
  document.querySelector('.modal-container').remove();
});

var AboveMenu = /*#__PURE__*/_createClass(function AboveMenu() {
  _classCallCheck(this, AboveMenu);
});

_defineProperty(AboveMenu, "addListener", function (_) {
  document.querySelectorAll('.above-menu').forEach(function (aboveMenu) {
    var aboveBotao = aboveMenu.querySelector('button');
    aboveBotao.addEventListener('click', function (_) {
      return AboveMenu.toggleVisible(aboveMenu);
    });
  });
});

_defineProperty(AboveMenu, "toggleVisible", function (element) {
  return element.querySelector('.menu').classList.toggle('visivel');
});

var Ajax = /*#__PURE__*/_createClass(function Ajax() {
  _classCallCheck(this, Ajax);
});

_defineProperty(Ajax, "saveTasksPosition", function (_) {
  var dados = {};
  colunas.forEach(function (coluna) {
    coluna.querySelectorAll('.tarefa').forEach(function (tarefa) {
      var posicao = tarefa.getAttribute('data-position');
      var tarefaId = tarefa.getAttribute('data-id');
      var colunaId = coluna.parentNode.getAttribute('data-column-id');
      Object.assign(dados, _defineProperty({}, tarefaId, {
        "coluna": colunaId,
        "posicao": posicao
      }));
    });
  });
  Ajax.requestReorder(JSON.stringify(dados));
});

_defineProperty(Ajax, "requestReorder", function (json) {
  var host = window.location.protocol + '//' + window.location.host;
  var url = host + "/board/".concat(projetoId, "/reorder");
  var data = "json=".concat(json);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', url);
  xhr.setRequestHeader('X-CSRF-TOKEN', token);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onreadystatechange = function (_) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
      } else {
        console.log("Problema ao atualizar ordem: ".concat(xhr.responseText));
      }
    }
  };

  xhr.send(data);
});

_defineProperty(Ajax, "getTaskData", function (tarefa) {
  console.log('Pegando dados da tarefa...');
  var host = window.location.protocol + '//' + window.location.host;
  var url = host + "/tarefas/".concat(tarefa.getAttribute('data-id'));
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url);
  xhr.setRequestHeader('X-CSRF-TOKEN', token);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onreadystatechange = function (_) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var resposta = JSON.parse(xhr.responseText);
        console.log(resposta);
        document.querySelector('#task-modal #task-title').innerText = resposta.title;
        document.querySelector('#task-modal .descricao').innerText = resposta.description; // document.querySelector('#task-modal .etiqueta').innerText = resposta.tag
        // document.querySelector('#task-modal .categoria').innerText = resposta.category
        // document.querySelector('#task-modal .designado').innerText = resposta.title
        // document.querySelector('#task-modal #referencia').innerHTML = resposta.title
      } else {
        console.log("Problema ao buscar dados da tarefa: ".concat(xhr.responseText));
      }
    }
  };

  xhr.send();
});

rodapes.forEach(function (rodape) {
  return rodape.addEventListener('dragenter', Kanban.rodapeDragenter);
});
tarefas.forEach(function (tarefa) {
  tarefa.addEventListener('dragenter', Kanban.tarefaDragenter);
  tarefa.addEventListener('dragstart', Kanban.tarefaDragstart);
  tarefa.addEventListener('dragend', function (_) {
    return Kanban.tarefaDragend(tarefa);
  });
  tarefa.addEventListener('click', function (_) {
    return Modal.openTask(tarefa);
  });
  tarefa.addEventListener('mousedown', function (_) {
    return taskMouseUp(tarefa);
  });
  tarefa.addEventListener('mouseup', function (_) {
    return taskMouseDown(tarefa);
  });
  tarefa.addEventListener('dragend', function (_) {
    return taskMouseDown(tarefa);
  });
});
filtroEscuro.addEventListener('click', Modal.close);
adicionarTarefa.forEach(function (coluna) {
  return coluna.addEventListener('click', function (_) {
    return Modal.openTaskForm(coluna);
  });
});
