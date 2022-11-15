
    $(document).ready(function(){
        
        $("#enviar").click(function(){
            var susc = $("#susc").val();
    
            $.post("../controlador/ajax/comprar-premium.php", {susc:susc}, function(res){

                console.log(res);
                let data = JSON.parse(res);
                console.log(data);
                $('#mensaje').html(data.msg);
            })
        })
    
    })

