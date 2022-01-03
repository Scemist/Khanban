// localStorage.clear() // Se não comentado, irá forcar a atualizar 

// Adicoina o css root ao HTML
function addRootCss (cssRoot) {
	const style = document.createElement('style')
	style.textContent = cssRoot
	document.head.append(style)
}

// Caso não exita o cssVersion ou esteja desatualizado, busca do servidor
if (typeof(localStorage.cssVersion) == 'undefined' || localStorage.cssVersion < 1) {
	console.log('Atualizando')
	localStorage.clear()

	fetch('css/all.home.css')
		.then(cssRoot => cssRoot.text())
		.then(cssRoot => {
			addRootCss(cssRoot)
			localStorage.setItem('cssVersion', 1.0)
			localStorage.setItem('cssRoot', cssRoot)
		})
} 
// Se existe e está atualizado, pega do local
else { 
	console.log('Pegando do Local')
	addRootCss(localStorage.cssRoot)
} 

if (typeof(localStorage.cssFontes) == 'undefined' || localStorage.cssVersion < 1) {
	console.log('Atualizando')
	localStorage.clear()

	fetch('fonts/opensans.css')
		.then(cssRoot => cssRoot.text())
		.then(cssRoot => {
			addRootCss(cssRoot)
			localStorage.setItem('cssVersion', 1.0)
			localStorage.setItem('cssFontes', cssRoot)
		})
} 
// Se existe e está atualizado, pega do local
else { 
	console.log('Pegando do Local')
	addRootCss(localStorage.cssFontes)
}


function localSize () {
	let lsTotal = 0, xLen, x
	for (x in localStorage) {
		if (!localStorage.hasOwnProperty(x))
		continue
		xLen = ((localStorage[x].length + x.length) * 2)
		lsTotal += xLen
		console.log(x.substr(0, 50) + ' = ' + (xLen / 1024).toFixed(2) + ' KB')
	}
	console.log('Total = ' + (lsTotal / 1024).toFixed(2) + ' KB')
}

// localSize()
