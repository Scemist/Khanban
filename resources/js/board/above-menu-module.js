class AboveMenu {
	static addListener = _ => {
		document.querySelectorAll('.above-menu').forEach(aboveMenu => {
			const aboveBotao = aboveMenu.querySelector('button')
			aboveBotao.addEventListener('click', _ => AboveMenu.toggleVisible(aboveMenu))
		})
	}

	static toggleVisible = element =>
		element.querySelector('.menu').classList.toggle('visivel')
}