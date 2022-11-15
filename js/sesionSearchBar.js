$(document).ready(function(){
    $.ajax(
        {
            url: '../controlador/obtener-datos.php',
        }).done(function(res){
            
            
            var data = $.parseJSON(res);



            if(data.usuario == undefined){
                var divUser = document.getElementById('user');
                divUser.style.display = 'none';
                
            } else{
                var img = '../images/fotos_de_perfil/' + data.foto; 
                var userdiv = document.getElementById('user');
                var foto = document.getElementById('foto');
                var menu = document.getElementById('menuConfig');
                var botonesX = document.getElementById('buttons');

                userdiv.innerText = data.usuario;
                botonesX.style.display = 'none';

                fotoimg = `<img  alt="#" src='../images/fotos_de_perfil/` 
                fotoimg += `${data.foto}' style="width: 40px; height: 40px; margin-top: 10px; border-radius: 50%; cursor: pointer;">`;
                $('#foto').html(fotoimg);

                foto.addEventListener("click", () => {
                    menu.classList.toggle("abrir");
                })

            }
            
        });
        
})