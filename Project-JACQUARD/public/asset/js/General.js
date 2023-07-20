const nav_button    = document.querySelector(".header-icon-nav");
const nav_quite     = document.querySelector(".button-quitte-nav");
const nav_affichage = document.querySelector("nav");

nav_button.addEventListener("click", function active() {
    nav_affichage.style.visibility = 'visible';
    nav_affichage.style.zIndex = '1';
})

nav_quite.addEventListener("click", function desactive() {
    nav_affichage.style.visibility = 'hidden';
    nav_affichage.style.zIndex = '-1';
})

const formulaire_connexion_button    = document.querySelector(".header-icon-register");
const formulaire_connexion_quite     = document.querySelector(".button-quitte-aside");
const formulaire_connexion_affichage = document.querySelector("aside");

formulaire_connexion_button.addEventListener("click", function active() {
    formulaire_connexion_affichage.style.visibility = 'visible';
    formulaire_connexion_affichage.style.zIndex = '1';
})

formulaire_connexion_quite .addEventListener("click", function desactive() {
    formulaire_connexion_affichage.style.visibility = 'hidden';
    formulaire_connexion_affichage.style.zIndex = '-1';
})

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


