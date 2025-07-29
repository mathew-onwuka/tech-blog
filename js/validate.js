function validateForm(myform) {
for (var i = 0; i < myform.elements.length; i++) {
	if (myform.elements.length < 3) {
		if (myform.elements[i].value == "") {

		alert("Please, enter a Category!");
		myform.elements[0].focus();
		return false;
		}
}

if (myform.elements[i].value == "") {
	alert("Please, provide ALL information!");
	myform.elements[0].focus();
	return false;
	}
}
}

