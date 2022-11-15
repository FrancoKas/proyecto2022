const btnMenu = document.querySelector('.btn-responsive');

const btnMenu2 = document.getElementById('btn_menu');
const btnImg = document.getElementById('userimg');
var menu = document.getElementById('accConfig');
const menuResp = document.getElementById("menuResponsive");

var x = 0;

btnMenu.addEventListener('click', function () {
  this.classList.toggle('is-active');

});

btnMenu2.addEventListener('click', function (){
  x++;
  if (x == 1) {

    menuResp.style.display = "block";
  } else {
    x = 0;
    menuResp.style.display = "none";
  }
});


btnImg.addEventListener('click', function () {
  if (menu.style.display === "none") {
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
});

