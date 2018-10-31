function validate() {
	var asu = document.getElementById('asu').value;
	var desc = document.getElementById('desc').value;

	if (asu=="" || desc=="") {
		if (asu=="") {
			document.getElementById('asu').style.border = "2px solid red";
			// alert('Es necesario rellenar todos los campos');
		}else{
			document.getElementById('desc').style.border = "initial";
		}
		if (desc=="") {
			document.getElementById('desc').style.border = "2px solid red";
			// alert('Es necesario rellenar todos los campos');
		}else{
			document.getElementById('desc').style.border = "initial";
		}

		return false;
	}else{
		return true;
	}
}