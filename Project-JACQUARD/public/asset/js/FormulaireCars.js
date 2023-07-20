const formulaire_contacte_button    = document.querySelector(".formulaire-contacte-button");
const formulaire_contacte_quite     = document.querySelector(".button-quitte-formulaire-contacte");
const formulaire_contacte_affichage = document.querySelector(".formulaire-de-contacte");

formulaire_contacte_button.addEventListener("click", function active() {
    formulaire_contacte_affichage.style.visibility = 'visible';
    formulaire_contacte_affichage.style.zIndex = '1';
})

formulaire_contacte_quite.addEventListener("click", function desactive() {
    formulaire_contacte_affichage.style.visibility = 'hidden';
    formulaire_contacte_affichage.style.zIndex = '-1';
})