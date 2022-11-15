$(document).ready(function () {
    $.ajax(
        {
            url: '../controlador/ajax/datos-evento.php',
            type: 'POST',
            success: function (res) {
                let data = JSON.parse(res);
                var html = '';
                console.log(data);
                $.each(data, function (e, even) {

                    console.log(even);




                    html += `<div class="partido">
                    <div class="partido-header">
                        <div class="partido-evento"><img src="../images/eventos/${even.img}" />${even.evento}</div>
                        <div class="partido-accion">`;
                    var ideven = 'notificacion(' + even.id + ')';

                    html += "<input type='button' id='btnsus' onclick=" + ideven + " class='seguir' style='text-decoration: none; border: none' value='SUSCRIBIRSE'>"


                    html += `</div>
                    </div>
                    <div class="partido-content">
                        <div class="column">
                            
                        </div>
                        <div class="column">
                            <div class="partido-detalles">
                                
                                <div class="partido-puntos">
                                    <span class="partido-puntos-numero partido-puntos-numero--leading">${even.evento}</span>
                                </div>
                                <div class="partido-time-lapsed">
                                    ${even.estado}
                                </div>
                                <div class="partido-arbitro">
                                <strong>${even.deporte}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                        <img style='width: 180px; height: 180px' src="../images/eventos/${even.img}" />
                            </div>
                        </div>
                    </div>
                </div>`



                });

                document.getElementById("contenedor").innerHTML = html;

                




            }

        });
        
        
    

        })


