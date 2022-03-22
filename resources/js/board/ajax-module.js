class Ajax {
	static saveTasksPosition = _ => {
		let dados = {}
		colunas.forEach(coluna => {
			coluna.querySelectorAll('.tarefa').forEach(tarefa => {
				const posicao = tarefa.getAttribute('data-position')
				const tarefaId = tarefa.getAttribute('data-id')
				const colunaId = coluna.parentNode.getAttribute('data-column-id')
				Object.assign(dados, {
					[tarefaId]: {
						"coluna": colunaId,
						"posicao": posicao
					}
				})
			})
		})
		Ajax.requestReorder(JSON.stringify(dados))
	}

	static requestReorder = json => {
		const host = window.location.protocol + '//' + window.location.host
		const url = host + `/board/${projetoId}/reorder`
		const data = `json=${json}`
		const xhr = new XMLHttpRequest()

		xhr.open('POST', url)
		xhr.setRequestHeader('X-CSRF-TOKEN', token)
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = _ => {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					console.log(xhr.responseText)
				} else {
					console.log(`Problema ao atualizar ordem: ${xhr.responseText}`)
				}
			}
		}
		xhr.send(data)
	}

	static getTaskData = tarefa => {
		console.log('Pegando dados da tarefa...')
		const host = window.location.protocol + '//' + window.location.host
		const url = host + `/tarefas/${tarefa.getAttribute('data-id')}`
		const xhr = new XMLHttpRequest()

		xhr.open('GET', url)
		xhr.setRequestHeader('X-CSRF-TOKEN', token)
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = _ => {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					const resposta = JSON.parse(xhr.responseText)
					console.log(resposta)

					document.querySelector('#task-modal #task-title').innerText = resposta.title
					document.querySelector('#task-modal .descricao').innerText = resposta.description
					// document.querySelector('#task-modal .etiqueta').innerText = resposta.tag
					// document.querySelector('#task-modal .categoria').innerText = resposta.category
					// document.querySelector('#task-modal .designado').innerText = resposta.title
					// document.querySelector('#task-modal #referencia').innerHTML = resposta.title
				} else {
					console.log(`Problema ao buscar dados da tarefa: ${xhr.responseText}`)
				}
			}
		}
		xhr.send()
	}
}