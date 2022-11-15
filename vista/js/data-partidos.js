$(document).ready(function () {
    $.ajax(
        {
            url: '../controlador/ajax/datos-partido.php',
            type: 'POST',
            success: function (res) {
                let data = JSON.parse(res);
                let html = '';
                console.log(data);
                var i = 0;
                var x = 0;
                var hola = 0;
                $.each(data, function (p, partido) {
                    
                  var idpart = 'notificacion(' + partido.idpartido + ', mensj' + partido.idpartido + ')';
                  
                    

                    html += `
                    <div class="partido">
		<div class="partido-header">
			<div class="partido-accion">

            <a class="seguir" style='text-decoration: none' data-bs-toggle="modal" href="#${partido.modal}" role="button">SEGUIR</a>

			</div>
		</div>
		<div class="partido-content">
			<div class="column">
				<div class="equipo equipo--home">
					<div class="logo-equipo">
						
						<img src="../images/equipos/${partido.imgequipo1}" />
					</div>
					<h2 class="nombre-equipo">${partido.equipo1}</h2>
				</div>
			</div>
			<div class="column">
				<div class="partido-detalles">
					<div class="partido-date">
						${partido.fecha}
					</div>
					<div class="partido-puntos">
						<span class="partido-puntos-numero partido-puntos-numero--leading">${partido.rese1}</span>
						<span class="partido-puntos-divisor">:</span>
						<span class="partido-puntos-numero">${partido.rese2}</span>
					</div>
					<div class="partido-time-lapsed">
						72'
					</div>
					<div class="partido-arbitro">
						Arbitro: <strong>${partido.arbitro}</strong>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="equipo equipo--away">
					<div class="logo-equipo">
				
						<img src="../images/equipos/${partido.imgequipo2}" />
					</div>
					<h2 class="nombre-equipo"> ${partido.equipo2}</h2>
				</div>
			</div>
		</div>
	</div>

    <div class="modal fade" id="${partido.modal}" aria-hidden="true" aria-labelledby="${partido.modal}" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content" style='background-color: #3f3f3f;'>

      <button class="btn btn-secondary" style='width: 80px; float: right;' data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Volver</button>
 

      <div class="equipos">
      <div class="data-partido">
      <div class="team equipo1">${partido.equipo1} <img src='../images/equipos/${partido.imgequipo1}'></div>
      <div class="score">
          <div class="puntaje">
              <span>${partido.rese1}</span>
              <span>:</span>
              <span>${partido.rese2}</span>
          </div>
          <div class="estado">${partido.estado}</div>
      </div>
      <div class="team equipo2"><img src='../images/equipos/${partido.imgequipo2}'> ${partido.equipo2} </div>
      </div>
  </div> 

  <div class="allInf">
   <div class="infracciones">
      <div class="inf inf-e1">`
      if(partido[2].length == 0){
        } else {
          partido[2].forEach(element => {
            console.log('<div class="box-e box-inf-e1">' + element.nomJug + ' ' + element.apeJug + '<br><span>' + element.nomPenalizacion + '</span></div>')
            html += '<div class="box-e box-inf-e1 mb-3">' + element.nomJug + ' ' + element.apeJug + '<br><span>' + element.nomPenalizacion + '</span></div>'
            
        });
        }
      


      html += `
      </div>
      <div class="inf inf-e2">`
      if(partido[3].length == 0){
        } else {
          partido[3].forEach(element => {
            '<div class="box-e box-inf-e2">' + element.nomJug + ' ' + element.apeJug + '<br><span>' + element.nomPenalizacion + '</span></div>'
            html += '<div class="box-e box-inf-e2 mb-3">' + element.nomJug + ' ' + element.apeJug + '<br><span>' + element.nomPenalizacion + '</span></div>'
            
        });
        }
      


      html += `
      </div>
  </div>
</div>
<div class="xFooter" style='background-color: #3f3f3f;'>
<div class="allAlin">
  <h3>ALINEACIONES</h3>
  <div class="alineacion">
      <div class="alin alin-e1" id='alin-e1'>
      `
      if(partido[0].length == 0){
        html += '<div class="alert alert-danger"><label>NO HAY JUGADORES<br><span style="color: rgb(105, 2, 2)">ERROR</span></label></div>';
        } else {
          partido[0].forEach(element => {
        
            html += '<div class="box-e"><label>'+ element.nomJug + ' ' + element.apeJug + '<br><span>' + element.rol +'</span></label></div>';
            
        });
        }
      


      html += `
      </div>
      <div class="alin alin-e2">
      `

      if(partido[1].length == 0){
        html += '<div class="alert alert-danger"><label>NO HAY JUGADORES<br><span style="color: rgb(105, 2, 2)">ERROR</span></label></div>';
        }

      partido[1].forEach(element => {

        html += '<div class="box-e"><label>'+ element.nomJug + ' ' + element.apeJug + '<br><span>' + element.rol +'</span></label></div>';
        
    });

      html += `
      </div>
  </div>
</div>
<div class='container mt-5 w-75'>
<div class='row'>
<div class="card w-50 h-75 text-center bg-dark text-white tarjeta col-9">
  <h5 class="card-header">INFORMACION DEL PARTIDO</h5>
  <div class="card-body">
    <p class="card-text">Fecha: ${partido.fecha}</p>
    <p class="card-text">Arbitro: ${partido.arbitro}</p>
    <form method='POST'>
    <input type='button' onclick="${idpart}" id='suscbtn' class='btn btn-light' value='Recibir Notificaciones'>
    </form>
    <div id='mensj${partido.idpartido}'></div>
  </div>
</div>
</div>
<div class='row'>
<div class="col-9"></div>
</div>
</div>
</div>  

      </div>

      </div>
  </div>`
                    
              
                   
                });

                document.getElementById("contenedor").innerHTML = html;
                


               
                
            }
            
        });

        
        

})