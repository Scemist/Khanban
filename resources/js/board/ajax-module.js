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

					const setValue = (identifier, value) => document.querySelector(`#task-modal ${identifier}`).innerText = value

					if (resposta.title != null) {
						setValue('#task-title', resposta.title)
					} else { setValue('#task-title', '') }

					if (resposta.description != null) {
						setValue('.descricao', resposta.description)
					} else { setValue('.descricao', '') }

					if (resposta.owner != null) {
						setValue('.criador', resposta.owner['name'])
					} else { setValue('.criador', '') }

					if (resposta.created_at != null) {
						setValue('.criado-em', resposta.created_at)
					} else { setValue('.criado-em', '') }

					if (resposta.tag != null) {
						setValue('.etiqueta', resposta.tag['title'])
					} else { document.querySelector('#task-modal .etiqueta').style.visibility = 'hidden' }

					if (resposta.category != null) {
						setValue('.categoria', resposta.category['title'])
					} else { document.querySelector('#task-modal .categoria').style.visibility = 'hidden' }

					if (resposta.designated != null) {
						setValue('.designado', resposta.designated['name'])
					} else { setValue('.designado', '') }

					if (resposta.reference != null) {
						document.querySelector('#task-modal .referencia').value = resposta.reference
					} else { document.querySelector('#task-modal .referencia').value = '' }

				} else {
					console.log(`Problema ao buscar dados da tarefa: ${xhr.responseText}`)
				}
			}
		}
		xhr.send()
	}
}