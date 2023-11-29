let btnAjouter = document.getElementById('btn_principal');

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



function incrementerPanier(){
    console.log("fonctionne");
}


