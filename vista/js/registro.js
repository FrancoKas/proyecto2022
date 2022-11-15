
    $(document).ready(function(){
        
        $("#enviar").click(function(){
            var nombre = $("#nombre").val();
            var user = $("#user").val();
            var email = $("#email").val();
            var pass = $("#contraseña").val();
            var cpass = $("#cContraseña").val();
    
            $.post("../controlador/ajax/registro.php", {nombre:nombre, user:user, email:email, contraseña:pass, cContraseña:cpass}, function(res){

                let data = JSON.parse(res);
                $('#mensaje').html(data.msg);
                    
            })
        })
    
    })

