const divFB = document.getElementById("grillFB");
const divVL = document.getElementById("grillVL");
const divBK = document.getElementById("grillBK");
const divTN = document.getElementById("grillTN");
const divBB = document.getElementById("grillBB");
const divRGB = document.getElementById("grillRGB");
const divBL = document.getElementById("grillBL");
const divGLF = document.getElementById("grillGLF");
const divPOOL = document.getElementById("grillPOOL");
const divBMT = document.getElementById("grillBM");

const btnFB = document.getElementById("futbol");
const btnVL = document.getElementById("voley");
const btnBK = document.getElementById("basket");
const btnTN = document.getElementById("tenis");
const btnBB = document.getElementById("baseball");
const btnRGB = document.getElementById("rugby");
const btnBL = document.getElementById("bolos");
const btnGLF = document.getElementById("golf");
const btnPOOL = document.getElementById("pool");
const btnBMT = document.getElementById("badminton");


btnVL.addEventListener("click", mostrar_voley);
btnFB.addEventListener("click", mostrar_fut);
btnBK.addEventListener("click", mostrar_basket);
btnTN.addEventListener("click", mostrar_tenis);
btnBB.addEventListener("click", mostrar_base);
btnRGB.addEventListener("click", mostrar_rugby);
btnBL.addEventListener("click", mostrar_bolos);
btnGLF.addEventListener("click", mostrar_golf);
btnPOOL.addEventListener("click", mostrar_pool);
btnBMT.addEventListener("click", mostrar_badmin);

function mostrar_voley(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.add("activo");
    divVL.style.display = "grid";
    divFB.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_fut(){
    btnFB.classList.add("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "grid";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_basket(){
    btnFB.classList.remove("activo");
    btnBK.classList.add("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "grid";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_tenis(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.add("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "grid";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_base(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.add("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "grid";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_rugby(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.add("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "grid";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_bolos(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.add("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "grid";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_golf(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.add("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "grid";
    divPOOL.style.display = "none";
    divBMT.style.display = "none";
}

function mostrar_pool(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.add("activo");
    btnBMT.classList.remove("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "grid";
    divBMT.style.display = "none";
}

function mostrar_badmin(){
    btnFB.classList.remove("activo");
    btnBK.classList.remove("activo");
    btnTN.classList.remove("activo");
    btnBB.classList.remove("activo");
    btnRGB.classList.remove("activo");
    btnBL.classList.remove("activo");
    btnGLF.classList.remove("activo");
    btnPOOL.classList.remove("activo");
    btnBMT.classList.add("activo");
    btnVL.classList.remove("activo");
    divFB.style.display = "none";
    divVL.style.display = "none";
    divBK.style.display = "none";
    divTN.style.display = "none";
    divBB.style.display = "none";
    divRGB.style.display = "none";
    divBL.style.display = "none";
    divGLF.style.display = "none";
    divPOOL.style.display = "none";
    divBMT.style.display = "grid";
}