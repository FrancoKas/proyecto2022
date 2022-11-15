const nuevaCat = document.getElementById('nuevaCat');
const labelCat = document.getElementById('labelCat');
const cDeporte = document.getElementById('cDeporte');
const selDeporte = document.getElementById('selDeporte');


nuevaCat.addEventListener('click', function () {
	selDeporte.style.display="none";
	nuevaCat.style.display="none";
	cDeporte.style.display="block";
	labelCat.style.display="block";
	$('#cDeporte').prop("required", true);
})