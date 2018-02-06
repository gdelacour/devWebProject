


document.addEventListener('DOMContentLoaded', function(){})

const $addButton = $('.add-person');
const $removeButton = $('.remove-person');
const $nbPerson = parseint($('.num-person').text());
const $qteIngredients = $('.qteIngredients')

let numPerson =parseFloat($nbPerson.first().text())



$addButton.on('click', function(event){
	const coef = numPerson;
	numPerson++;
	calculateQte(coef, numPerson);

});

$removeButton.on('click', function (event) {
	if (numPerson === 1) {
		return;
	}
	const coef = numPerson;
	numPerson++;
	calculateQte(coef, numPerson);
})
