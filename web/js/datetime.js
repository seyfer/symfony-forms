/**
 * Created by seyfer on 4/11/17.
 */

$(document).ready(function () {
	var form = document.forms[0];

	console.log(document.forms);

	var dt = form.elements['item_dateTimeField'];

	window.setInterval(function () {
		dt.value = moment().format();
	}, 1000);
});

