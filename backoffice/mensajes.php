

<?php


function mensajeOK($mensaje)
{

    echo '<div style="width: 100%; height: 10%; display: flex; justify-content: center; margin-top: 100px;">';
    echo '<h5 style="padding:10px; font-family: poppins; border-radius: 7px; border: 1px solid green; background-color: #B8FFB2; width: auto; height: 40px">' . $mensaje . '</h3>';
    echo '</div>';
}

function mensajeError($mensaje)
{

    echo '<div style="width: 100%; height: 20%; display: flex; justify-content: center; margin-top: 100px;">';
    echo '<h5 style="padding:10px; font-family: poppins; border-radius: 7px; border: 1px solid #BB0606; background-color: #FD8080; width: 200px; height: 40px">' . $mensaje . '</h3>';
    echo '</div>';
}
