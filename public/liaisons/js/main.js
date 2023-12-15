let categories = document.querySelectorAll(".item-categorie");

for (i = 0; i < categories.length; i++) {
    let stringCategorie = categories[i].innerText;
    categories[i].innerHTML = stringCategorie.charAt(0).toUpperCase() + stringCategorie.slice(1);

}

let numeroPanier = document.getElementById('p_numeroPanier');


fetch('https://timunix3.csfoy.ca/~mj2/public/index.php?controleur=panier&action=compter')
    .then(response => response.json())
    .then(json1 => {
            numeroPanier.innerText = JSON.stringify(json1.quantite);
        }
    )



