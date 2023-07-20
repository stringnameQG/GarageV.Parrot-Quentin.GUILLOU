const filtres_button    = document.querySelector(".filtres-button");
const filtres_quite     = document.querySelector(".button-filtres-quitter");
const filtres_affichage = document.querySelector(".filtres-de-sélection");

filtres_button.addEventListener("click", function active() {
    filtres_affichage.style.visibility = 'visible';
    filtres_affichage.style.zIndex = '1';
})

filtres_quite.addEventListener("click", function desactive() {
    filtres_affichage.style.visibility = 'hidden';
    filtres_affichage.style.zIndex = '-1';
})

