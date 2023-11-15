let categories = document.querySelectorAll(".item-categorie");

for (i = 0; i < categories.length; i++) {
    let stringCategorie = categories[i].innerText;
    categories[i].innerHTML = stringCategorie.charAt(0).toUpperCase() + stringCategorie.slice(1);

}




