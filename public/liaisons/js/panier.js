// function afficherDescription() {
//     var descriptionContenu = document.getElementById("descriptionContenu");
//     var voirPlusLink = document.querySelector(".voir_plus");
//
//     // Si la description est actuellement tronquée, alors afficher tout
//     if (descriptionContenu.classList.contains("tronquee")) {
//         descriptionContenu.classList.remove("tronquee");
//         voirPlusLink.innerHTML = "Voir moins";
//     } else {
//         // Sinon, tronquer la description et ajouter "Voir plus"
//         descriptionContenu.classList.add("tronquee");
//         voirPlusLink.innerHTML = "Voir plus";
//     }
// }


//btnAjouter.addEventListener("click", incrementerPanier);

let btnAjouter = document.getElementById('btn_principal2');



let idLivre = document.getElementById('idLivre').value;
btnAjouter.addEventListener("click", () => {
    synchron()
});

function synchron() {
    let quantiteLivre = document.getElementById('quantite').value;

    fetch('http://localhost:8888/Rpni/MJ2/public/index.php?controleur=article&action=ajouter&id=' + idLivre + '&quantite=' + quantiteLivre)



/*****************************************************************/

    fetch('http://localhost:8888/Rpni/MJ2/public/index.php?controleur=panier&action=compter')
        .then(response => response.json())
        .then(json1 => {
                numeroPanier.innerText = JSON.stringify(json1.quantite);
            }
        )
}

