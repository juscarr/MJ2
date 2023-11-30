/*****************************************************************/

let btnPoursuivre_1 = document.getElementById('btn_principal_livraisonPanier--section1');

btnPoursuivre_1.addEventListener('click', afficherSection2);

let section1 = document.getElementById('section1');
let section2 = document.getElementById('section2');
let section3 = document.getElementById('section3');

let rectangle1_section1 = document.getElementById('etape1_section1');
let rectangle1_section2 = document.getElementById('etape1_section2');

let rectangle2_section2 = document.getElementById('etape2_section2');

let rectangle1_section3 = document.getElementById('etape1_section3');
let rectangle2_section3 = document.getElementById('etape2_section3');
let rectangle3_section3 = document.getElementById('etape3_section3');


rectangle1_section1.classList.add('rectangleRempli');

/******************************************************/

function afficherSection2(){
    section1.style.display = "none";
    section2.style.display = "block";

    rectangle1_section1.classList.remove('rectangleRempli');
    rectangle1_section2.classList.add('rectangleHorsService');
    rectangle2_section2.classList.add('rectangleRempli');
}

/*****************************************************************/
/*****************************************************************/
/*****************************************************************/

let btnPoursuivre_2 = document.getElementById('btn_principal_livraisonPanier--section2');

btnPoursuivre_2.addEventListener('click', afficherSection3);

function afficherSection3(){
    section2.style.display = "none";
    section3.style.display = "block";

    rectangle1_section2.classList.remove('rectangleRempli');
    rectangle1_section3.classList.add('rectangleHorsService');
    rectangle2_section3.classList.add('rectangleHorsService');
    rectangle3_section3.classList.add('rectangleRempli');
}
