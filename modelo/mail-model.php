<?php 
function enviarMail($destinatario, $titulo, $asunto){

    $yo = "fkasmenko@gmail.com";
    $cabecera = "DESDE:" . $yo;

    mail($destinatario,$titulo,$asunto, $cabecera);
    return 1;
}
