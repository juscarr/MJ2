const flecheDroite1 = document.querySelector('.cercleDroit1');
const flecheGauche1 = document.querySelector('.cercleGauche1');

const flecheDroite2 = document.querySelector('.cercleDroit2');
const flecheGauche2 = document.querySelector('.cercleGauche2');

const flecheDroite3 = document.querySelector('.cercleDroit3');
const flecheGauche3 = document.querySelector('.cercleGauche3');


const listeLivre = document.querySelectorAll(".item_li");
const listeLivre2 = document.querySelectorAll(".item_li2");
const listeLivre3 = document.querySelectorAll(".item_li3");


let large = null;
let index = 1;
setInterval(verifierLargeur, 1000)

function verifierLargeur() {
    let largeurEcran = window.innerWidth;

    if (largeurEcran >= 600) {
        large = true;
        listeLivre[index - 1].hidden = false;
        listeLivre[index].hidden = false;
        listeLivre[index + 1].hidden = false;

    } else {
        large = false;
        listeLivre[index - 1].hidden = true;
        listeLivre[index + 1].hidden = true;
        listeLivre[index].hidden = false;

    }
}

flecheDroite1.addEventListener('click', changerImageSuivant);
flecheGauche1.addEventListener('click', changerImagePrecedent);

/*****************************************************************/
changerImageSuivant();
// changerImageSuivant3();

/*****************************************************************/


function changerImageSuivant() {
    if (large) {
        console.log(large)
        listeLivre[index - 1].hidden = true;
        listeLivre[index].hidden = true;
        listeLivre[index + 1].hidden = true;
        index++
        listeLivre[index - 1].hidden = false;
        listeLivre[index].hidden = false;
        listeLivre[index + 1].hidden = false;

        flecheGauche1.classList.remove('flecheNonFonctionnel');
        flecheGauche1.addEventListener('click', changerImagePrecedent);

    } else {
        listeLivre[index].hidden = true;
        index++;
        listeLivre[index].hidden = false;
        flecheGauche1.classList.remove('flecheNonFonctionnel');
        flecheGauche1.addEventListener('click', changerImagePrecedent);
    }
}

function changerImagePrecedent() {
    if (large) {
        listeLivre[index - 1].hidden = true;
        listeLivre[index].hidden = true;
        listeLivre[index + 1].hidden = true;
        index--;
        listeLivre[index - 1].hidden = false;
        listeLivre[index].hidden = false;
        listeLivre[index + 1].hidden = false;

        console.log(index);

        if (index === 1){
            flecheGauche1.classList.add('flecheNonFonctionnel');
            flecheGauche1.removeEventListener('click', changerImagePrecedent);
        }

    } else {
        listeLivre[index].hidden = true;
        index--;
        listeLivre[index].hidden = false;


        if (index === 0){
            flecheGauche1.classList.add('flecheNonFonctionnel');
            flecheGauche1.removeEventListener('click', changerImagePrecedent);
        }

    }


}

/*****************************************************************/
flecheDroite2.addEventListener('click', changerImageSuivant2);
flecheGauche2.addEventListener('click', changerImagePrecedent2);

function changerImageSuivant2() {

    listeLivre2[index].hidden = true;
    index++;
    listeLivre2[index].hidden = false;
    flecheGauche2.classList.remove('flecheNonFonctionnel');
    flecheGauche2.addEventListener('click', changerImagePrecedent2);
    console.log(index)
}

function changerImagePrecedent2() {
    listeLivre2[index].hidden = true
    index--;
    listeLivre2[index].hidden = false;

    if (index === 0) {
        flecheGauche2.removeEventListener('click', changerImagePrecedent2);
        flecheGauche2.classList.add('flecheNonFonctionnel');
        console.log('index est a 0');
    }

}

/*****************************************************************/
flecheDroite3.addEventListener('click', changerImageSuivant3);
flecheGauche3.addEventListener('click', changerImagePrecedent3);

function changerImageSuivant3() {

    listeLivre3[index].hidden = true;
    index++;
    listeLivre3[index].hidden = false;
    flecheGauche3.classList.remove('flecheNonFonctionnel');
    flecheGauche3.addEventListener('click', changerImagePrecedent3);
    console.log(index)
}

function changerImagePrecedent3() {
    listeLivre3[index].hidden = true
    index--;
    listeLivre3[index].hidden = false;

    if (index === 0) {
        flecheGauche3.removeEventListener('click', changerImagePrecedent3);
        flecheGauche3.classList.add('flecheNonFonctionnel');
        console.log('index est a 0');
    }

}