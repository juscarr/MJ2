let btnAjouter = document.getElementById('btn_principal2');

let idLivre = document.getElementById('idLivre').value;
btnAjouter.addEventListener("click", () => {
    synchron()
});

function synchron() {
    let quantiteLivre = document.getElementById('quantite').value;
    if(numeroPanier.value <= 1){
        numeroPanier.classList.add('animationPanier');
    }

    fetch('https://timunix3.csfoy.ca/~mj2/public/index.php?controleur=article&action=ajouter&id=' + idLivre + '&quantite=' + quantiteLivre)

    fetch('https://timunix3.csfoy.ca/~mj2/public/index.php?controleur=panier&action=compter')
        .then(response => response.json())
        .then(json1 => {
                numeroPanier.innerText = JSON.stringify(json1.quantite);
            }
        )

}

