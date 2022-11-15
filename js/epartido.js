const partido = document.getElementById('partido');
const eliminar = document.getElementById('eliminar');
const anotacion1 = document.getElementById('anotacion1');
const anotacion2 = document.getElementById('anotacion2');
const fecha = document.getElementById('fecha');

eliminar.addEventListener("change", eliminarPartido, false);


function eliminarPartido()
{
  var checked = eliminar.checked;
  if(checked){
    $('#anotacion1').prop("required", false);
    $('#anotacion2').prop("required", false);
    $('#fecha').prop("required", false);
  } else{
    $('#partido').prop("required", true);
    $('#anotacion1').prop("required", true);
    $('#anotacion2').prop("required", true);
    $('#fecha').prop("required", true);
  }
}