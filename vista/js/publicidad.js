$(document).ready(function () {
    $.ajax(
        {
            url: '../controlador/ajax/datos-publicidad.php',
            type: 'POST',
            success: function (res) {
                let data = JSON.parse(res);
                let html = '';
                console.log(data);
                $.each(data, function (p, publi) {
                    
                    html += `<a href='${publi.link}'><img src='../images/publicidades/${publi.imagen}'></a>`
                    
                   
                });
                
                $('#publicidad').html(html);


               
                
            }
        })

})