


document.addEventListener('DOMContentLoaded', function(){})
	const $addButton = $('add-person');
	const $removeButton = $('remove-person');

	//console.dir($addButton);
	//console.dir($removeButton);

	$addButton.on('click', function(event){
		console.dir(event);
	});

	$removeButton.on('click', function (event) {
		console.dir(event);
	})