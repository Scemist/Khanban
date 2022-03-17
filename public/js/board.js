/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/board.js":
/*!*******************************!*\
  !*** ./resources/js/board.js ***!
  \*******************************/
/***/ (() => {

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

_defineProperty(Modal, "openTask", function (_) {
  return Modal.open('#task-modal-template');
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
      var colunaId = coluna.parentNode.getAttribute('data-id');
      Object.assign(dados, _defineProperty({}, tarefaId, {
        "coluna": colunaId,
        "posicao": posicao
      }));
    });
  });
  Ajax.request(JSON.stringify(dados));
});

_defineProperty(Ajax, "request", function (json) {
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
        console.log('Problema');
      }
    }
  };

  xhr.send(data);
});

rodapes.forEach(function (rodape) {
  return rodape.addEventListener('dragenter', Kanban.rodapeDragenter);
});
colunas.forEach(function (coluna) {// coluna.addEventListener('dragenter', Kanban.colunaDragenter)
  // coluna.addEventListener('dragleave', Kanban.colunaDragleave)
});
tarefas.forEach(function (tarefa) {
  tarefa.addEventListener('dragenter', Kanban.tarefaDragenter);
  tarefa.addEventListener('dragstart', Kanban.tarefaDragstart);
  tarefa.addEventListener('dragend', function (_) {
    return Kanban.tarefaDragend(tarefa);
  });
  tarefa.addEventListener('click', Modal.openTask);
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

var taskMouseUp = function taskMouseUp(tarefa) {
  return tarefa.classList.add('task-click-animated');
};

var taskMouseDown = function taskMouseDown(tarefa) {
  return tarefa.classList.remove('task-click-animated');
};

/***/ }),

/***/ "./resources/css/login.css":
/*!*********************************!*\
  !*** ./resources/css/login.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/project-template.css":
/*!********************************************!*\
  !*** ./resources/css/project-template.css ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/projeto.css":
/*!***********************************!*\
  !*** ./resources/css/projeto.css ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/root.css":
/*!********************************!*\
  !*** ./resources/css/root.css ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/fonts/opensans.css":
/*!**************************************!*\
  !*** ./resources/fonts/opensans.css ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/board.css":
/*!*********************************!*\
  !*** ./resources/css/board.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/criar.css":
/*!*********************************!*\
  !*** ./resources/css/criar.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/index-template.css":
/*!******************************************!*\
  !*** ./resources/css/index-template.css ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/index.css":
/*!*********************************!*\
  !*** ./resources/css/index.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/lista.css":
/*!*********************************!*\
  !*** ./resources/css/lista.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/board": 0,
/******/ 			"css/root": 0,
/******/ 			"css/lista": 0,
/******/ 			"css/index": 0,
/******/ 			"css/index-template": 0,
/******/ 			"css/criar": 0,
/******/ 			"css/board": 0,
/******/ 			"fonts/opensans": 0,
/******/ 			"css/projeto": 0,
/******/ 			"css/project-template": 0,
/******/ 			"css/login": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/js/board.js")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/board.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/criar.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/index-template.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/index.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/lista.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/login.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/project-template.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/projeto.css")))
/******/ 	__webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/css/root.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/root","css/lista","css/index","css/index-template","css/criar","css/board","fonts/opensans","css/projeto","css/project-template","css/login"], () => (__webpack_require__("./resources/fonts/opensans.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;