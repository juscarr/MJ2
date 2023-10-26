
const flecheDroite = document.querySelector('.cercleDroit1');
const flecheGauche = document.querySelector('.cercleGauche1');
const listeLivre = document.querySelectorAll(".item_li");

let index = 1;

changerImageSuivant();

flecheDroite.addEventListener('click', changerImageSuivant);

flecheGauche.addEventListener('click', changerImagePrecedent);


function changerImageSuivant() {

    listeLivre[index].hidden = true;
    index++;
    listeLivre[index].hidden = false;
    flecheGauche.classList.remove('flecheNonFonctionnel');
    flecheGauche.addEventListener('click', changerImagePrecedent);
    console.log(index)
}

function changerImagePrecedent() {
    listeLivre[index].hidden = true
    index--;
    listeLivre[index].hidden = false;

    if (index === 0){
        flecheGauche.removeEventListener('click', changerImagePrecedent);
        flecheGauche.classList.add('flecheNonFonctionnel');
        console.log('index est a 0');
    }

}