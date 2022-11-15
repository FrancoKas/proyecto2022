
    $(document).ready(function(){
        
       

            $('input[type=checkbox]').on('change', function() {

                console.log('hola');

                if ($(this).is(':checked') ) {
                    console.log($(this).prop('id'));
                    console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Seleccionado");
                } else {
                    console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") => Deseleccionado");
                }
            });

          
     
    
    })

