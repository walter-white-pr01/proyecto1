
function validate() {
	var user = document.getElementById('user').value;
	var pass = document.getElementById('pass').value;

	if (user=="" || pass=="") {
		alert('Es necesario rellenar todos los campos');
		return false;
	}else{
		return true;
	}
}