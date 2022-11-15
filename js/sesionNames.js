$(document).ready(function(){
    $.ajax(
        {
            url: '../controlador/obtener-datos.php',
        }).done(function(res){

            var data = $.parseJSON(res);

                var userText = document.getElementById('usuario');

                userText.innerText = data.nombre;
                
                foto = `<img  alt="#" src='../images/fotos_de_perfil/` 
                foto += `${data.foto}' style="width: 90px; height: 90px; margin-top: 10px; border-radius: 50%;">`;
                $('#perfil').html(foto);
        
            
        });
        
})