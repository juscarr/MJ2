let btnAjouter = document.getElementById('btn_secondaire');

let numeroPanier = document.getElementById('p_numeroPanier');

btnAjouter.addEventListener("click", incrementerPanier);


function afficherDescription() {
    var descriptionContenu = document.getElementById("descriptionContenu");
    var voirPlusLink = document.querySelector(".voir_plus");

    // Si la description est actuellement tronquée, alors afficher tout
    if (descriptionContenu.classList.contains("tronquee")) {
        descriptionContenu.classList.remove("tronquee");
        voirPlusLink.innerHTML = "Voir moins";
    } else {
        // Sinon, tronquer la description et ajouter "Voir plus"
        descriptionContenu.classList.add("tronquee");
        voirPlusLink.innerHTML = "Voir plus";
    }
}


function incrementerPanier(event){
    let compteurActuel = parseInt(numeroPanier.innerText);
    compteurActuel++;
    numeroPanier.innerText = compteurActuel;

    console.log("fonctionne");
}


