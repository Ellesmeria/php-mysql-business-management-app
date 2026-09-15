"use strict";

function range(count) {
	let arr = []
	for (let i = 0; i < count; i++) {
		arr.push(i+1);
	}
	return arr;
}

function getLastDay(year, month) {
	let date = new Date(year, month + 1, 0);
	
	return date.getDate();
}

function getFirstWeekDay(year, month) {
	let date = new Date(year, month, 1);
	return date.getDay();	
}

function getLastWeekDay(year, month) {
	let date = new Date(year, month + 1, 0);
	return date.getDay();
}

function normalize(arr, left, right) {
	if (left == -1) {
		left = 6;
	}
	if (right == 7) {
		right = 0;
	}
	for (let i = 0; i < left; i++) {
		arr.unshift('');
	}
	for (let i = 0; i < right; i++) {
		arr.push('');
	}
	return arr;
}

function chunk(arr, n) {
	let newArr = [];
	let k = 0;
	for (let i = 0; i < arr.length / n; i++) {
		newArr[i] = [];
		for (let j = 0; j < n; j++) {
			newArr[i][j] = arr[k];
			k++;
		}
	}
	return newArr;	
}

function createTable(parent, arr, year, month) {
	parent.innerHTML = '';

	for (let i = 0; i < arr.length; i++) {
		let tr = document.createElement('tr');

		for (let j = 0; j < arr[i].length; j++) {
			let td = document.createElement('td');

			let day = arr[i][j];

			if (day !== '') {
				let monthForValue = String(month + 1).padStart(2, '0');
				let dayForValue = String(day).padStart(2, '0');
				let fecha = year + '-' + monthForValue + '-' + dayForValue;

        td.dataset.fecha = fecha;
				td.innerHTML = `<div class="dias_libres_calendario_dia">${day}</div><div class="dias_libres_calendario_content_wrap"></div>`;
				
			} else {
				td.classList.add('empty');
			}

			tr.append(td);
		}

		parent.append(tr);
	}
}

function showMonth(year,month) {
	let arr = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

	let info = document.querySelector('.info');
	info.textContent = arr[month] + ' ' + year;
}

function draw(body, year, month) {
	let arr = range(getLastDay(year, month));
	let firstWeekDay = getFirstWeekDay(year, month);
	let lastWeekDay  = getLastWeekDay(year, month);
	let nums = chunk(normalize(arr, firstWeekDay - 1, 7 - lastWeekDay), 7);
	
	createTable(body, nums, year, month);
	showMonth(year, month);
	cargar_dias_libres(year, month);
}

function getNextMonth(month) {
	if (month == 11) {
		return 0;
	}
	else {
		return month + 1;
	} 
	
}

function getNextYear(year, month) {
	if (month == 11) {
		return year + 1;
	}
	else {
		return year;
	} 
}

function getPrevMonth(month) {
	if (month == 0) {
		return 11;
	}
	else {
		return month - 1;
	}
}

function getPrevYear(year, month) {
	if (month == 0) {
		return year - 1;
	}
	else {
		return year;
	} 
}

async function cargar_dias_libres(year, month) {
	let datos = new FormData();

	datos.append('year', year);
	datos.append('month', month + 1);

	let response = await fetch('ajax/calendario.php', {
		method: 'POST',
		body: datos
	});

	let ausencias = await response.json();

	for (let ausencia of ausencias) {
		let td = document.querySelector('[data-fecha="' + ausencia.fecha + '"]');

		if (td) {
			let contenedor = td.querySelector('.dias_libres_calendario_content_wrap');

			contenedor.insertAdjacentHTML('beforeend', `
				<div data-id-ausencia="${ausencia.id_ausencia}" class=" dias_libres_calendario_content dias_libres_calendario_${ausencia.motivo}">
					${ausencia.nombre}
				</div>
			`);
		}
	}
}


let calendar = document.querySelector('#calendar');
let body = calendar.querySelector('.body');

let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();

let prev = calendar.querySelector('.prev');
let next = calendar.querySelector('.next');

draw(body, year, month);

next.addEventListener('click', function(e) {
	e.preventDefault();

	year = getNextYear(year, month);
	month = getNextMonth(month);

	draw(body, year, month);
});

prev.addEventListener('click', function(e) {
	e.preventDefault();

	year = getPrevYear(year, month);
	month = getPrevMonth(month);

	draw(body, year, month);
});


main.addEventListener('click', async (e) => {
	
	let div = e.target.closest('[data-id-ausencia]');
	if (div) {
		let td = e.target.closest('td[data-fecha]');
		let datos = new FormData();
		datos.append('fecha', td.dataset.fecha);
		datos.append('id_ausencia', div.dataset.idAusencia);
		let response = await fetch('ajax/dias_libres_cambiar_formulario.php',{
			method: 'POST',
			body: datos
		});
		let content = await response.text();
		main.insertAdjacentHTML('beforeend', content);
	}
});

main.addEventListener('submit', async (e) => {
	let dias_libres_data_form_cambiar = e.target.closest('.dias_libres_data_form_cambiar');
	let data_form = e.target.closest('.data_form');
	if(dias_libres_data_form_cambiar) {
		e.preventDefault();
		let datos = new FormData(dias_libres_data_form_cambiar);
		datos.append('id_ausencia', e.submitter.value);
		let response = await fetch('ajax/dias_libres_cambiar.php',{
			method: 'POST',
			body: datos
		});
		let content = await response.text();
		data_form.remove();
		draw(body, year, month);
	}
})

main.addEventListener('doubleclcik', async (e) => {
	alert(1);
});