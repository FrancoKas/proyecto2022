
    $(document).ready(function(){
        
        $("#enviar").click(function(){
            
            var user = $("#user").val();
            var pass = $("#pass").val();
    
            $.post("../controlador/ajax/login.php", {user:user, pass:pass}, function(res){
                let data = JSON.parse(res);


                    if(data.success){
                        window.location.href='index.html';
                    } else {
                        $('#mensaje').html(data.msg);
                    }
                    
                
            })
        })
    
    })

