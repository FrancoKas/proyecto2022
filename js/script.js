window.onscroll = function(){

    scroll = document.documentElement.scrollTop;

    header = document.getElementById("header");

    if (scroll > 20){
        header.classList.add('nav_mod');
    }else if (scroll < 20){
        header.classList.remove('nav_mod');
    }

}

document.getElementById("btn_menu").addEventListener("click", mostrar_menu);

    menu = document.getElementById("header");
    body = document.getElementById("container__all");
    nav = document.getElementById("nav");

function mostrar_menu(){

    body.classList.toggle('move_content');
    menu.classList.toggle('move_content');
    nav.classList.toggle('move_nav');
}

window.addEventListener("resize", function(){

    if (window.innerWidth > 760)  {
        body.classList.remove('move_content');
        menu.classList.remove('move_content');
        nav.classList.remove('move_nav');
    }

});

let pregunta = document.querySelectorAll('.pregunta');
let btnDropdown = document.querySelectorAll('.pregunta .more')
let respuesta = document.querySelectorAll('.respuesta');
let parrafo = document.querySelectorAll('.respuesta p');

for ( let i = 0; i < btnDropdown.length; i ++ ) {

    let altoParrafo = parrafo[i].clientHeight;
    let switchc = 0;

    btnDropdown[i].addEventListener('click', () => {

        if ( switchc == 0 ) {

            respuesta[i].style.height = `${altoParrafo}px`;
            pregunta[i].style.marginBottom = '10px';
            btnDropdown[i].innerHTML = '❓';
            switchc ++;

        }

        else if ( switchc == 1 ) {

            respuesta[i].style.height = `0`;
            pregunta[i].style.marginBottom = '0';
            btnDropdown[i].innerHTML = '❓';
            switchc --;

        }

    })

}