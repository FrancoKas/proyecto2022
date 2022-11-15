$(document).ready(function () {
    $.ajax(
        {
            url: '../controlador/ajax/chk-deportes.php',
            type: 'POST',
            success: function (res) {
                let data = JSON.parse(res);
                let html = '';
                console.log(data);
                var i = 0;
                
                $.each(data, function (c, chk) {
                    if(i == 0){
                        html +=`<div class='row justify-content-md-center'>`;
                    }
                    i++;

                    

                    html += `
        
                    <div class="form-check form-switch col col col-lg-2">
                        <input class="form-check-input" type="checkbox" value='${chk.id}' name='chk${chk.id}' id="chk${chk.id}">
                        <label class="form-check-label" for="flexSwitchCheckDefault">${chk.nombre}</label>
                    </div>
                    
                    `
                    
                    if(i == 3){
                        i = 0;

                        html +=`</div>`;
                    }


                });

                console.log(data.length);

                $('#preferencias').html(html);



            }
        })

})