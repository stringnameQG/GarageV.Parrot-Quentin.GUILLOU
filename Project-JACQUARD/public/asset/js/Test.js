const bouton_recherche = document.querySelector(".button-recherche");

const prix_minimum_valeur = document.querySelector("#prix-minimum");
const prix_maximum_valeur = document.querySelector("#prix-maximum");

const kilometrage_minimum_valeur = document.querySelector("#killometrage-minimum");
const kilometrage_maximum_valeur = document.querySelector("#killometrage-maximum");

const annee_minimum_valeur = document.querySelector("#annee-minimum");
const annee_maximum_valeur = document.querySelector("#annee-maximum");

let elementPrix;
let elementKilometrage;
let elementAnnee;

let prixMin = 0;
let prixMax = 99999999;

let kilometrageMin  = 0;
let kilometrageMax = 99999999;

let anneMin  = 0;
let anneMax = 99999999;

let voitureCiblePrix = [];
let voitureCibleKilometrage = [];
let voitureCibleAnnee = [];

voitureCiblePrix = document.querySelector(".prix");
voitureCibleKilometrage = document.querySelector(".kilometrage");
voitureCibleAnnee = document.querySelector(".annee");

function Voitures(prix, kilometrage, anne) {
  this.prix = prix;
  this.kilometrage = kilometrage;
  this.anne  = anne;
}

let voitures = [];

for(i = 0; i < voitureCiblePrix.length - 1; i++){

} 

array.forEach(element => {
  
});


function filterVoitureByPrice(prixMin, prixMax, kilometrageMin, kilometrageMax, anneMin, anneMax) {
  return voitures.filter((item) => item.prix >= prixMin && item.prix <= prixMax 
  && item.kilometrage >= kilometrageMin && item.kilometrage <= kilometrageMax
  && item.anne >= anneMin && item.anne <= anneMax );
}



const fetchImages = () => {
    fetch("https://api.github.com/users")
      .then(res => {
        res
          .json()
          .then(res => {
            users = res
            showUsers(users)
          })
          .catch(err => console.log(err))
      })
      .catch(err => console.log(err))
  }


bouton_recherche.addEventListener("click", function recherche() {

    prinMin = 0;
    prinMax = 0;
    kilometrageMin = 0;
    kilometrageMax = 0;
    anneMin = annee_minimum_valeur.value;
    anneMax = 0;

    if(anneMin == null){
        console.log(anneMin);
    }
    else{
        console.log("ratée");
    }
    

    
})

