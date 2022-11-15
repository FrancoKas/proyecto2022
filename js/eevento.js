const partido = document.getElementById('partido');
const chkpartido = document.getElementById('chkpartido');
const deporte = document.getElementById('deporte');
const chkdeporte = document.getElementById('chkdeporte');
const nomevento = document.getElementById('nomevento');
const chknombre = document.getElementById('chknombre');
const equipo = document.getElementById('equipo');
const chkequipo = document.getElementById('chkequipo');


const eliminar = document.getElementById('eliminar');
eliminar.addEventListener("change", eliminarPartido, false);
chkpartido.addEventListener("change", chkPartido, false);
chkdeporte.addEventListener("change", chkDeporte, false);
chknombre.addEventListener("change", chkEvento, false);
chkequipo.addEventListener("change", chkEquipo, false)


function chkPartido(){

    var checked = chkpartido.checked;

    if(checked){
        $('#partido').prop("required", true);
      } else{
        $('#partido').prop("required", false);
      }
}

function chkDeporte(){
    var checked = chkdeporte.checked;
    if(checked){
        $('#deporte').prop("required", true);
      } else{
        $('#deporte').prop("required", false);
      }
}

function chkEvento(){
    var checked = chknombre.checked;
    if(checked){
        $('#nomevento').prop("required", true);
      } else{
        $('#nomevento').prop("required", false);
      }
}

function chkEquipo(){
    var checked = chkequipo.checked;
    if(checked){
        $('#equipo').prop("required", true);
      } else{
        $('#equipo').prop("required", false);
      }
}

function chkPartido(){
    var checked = chkpartido.checked;
    if(checked){
        $('#partido').prop("required", true);
      } else{
        $('#partido').prop("required", false);
      }
}


function eliminarPartido()
{
  var checked = eliminar.checked;
  if(checked){
    $('#partido').prop("required", false);
    $('#deporte').prop("required", false);
    $('#nomevento').prop("required", false);
    $('#equipo').prop("required", false);
  }
}