let buttonListe = document.getElementById("disposition-droite");
let buttonVignette = document.getElementById("disposition-gauche");
let liste = document.querySelectorAll(".catalogue-liste li");
let containerNvApr = document.querySelectorAll(".container-type")

buttonListe.addEventListener("click", affichageToggle);
buttonVignette.addEventListener("click", affichageToggle);

function affichageToggle() {
    liste.forEach(li => {
            if (buttonListe.checked) {
                if (li.classList.contains("catalogue-item--auteur")) {
                    li.classList.add("item-liste--auteur");
                    li.classList.remove("item-vignette");
                } else {
                    li.classList.add("item-liste");
                    li.classList.remove("item-vignette");
                }

            }
            if (buttonVignette.checked) {
                if (li.classList.contains("catalogue-item--auteur")) {
                    li.classList.add("item-vignette");
                    li.classList.remove("item-liste--auteur");
                } else {
                    li.classList.add("item-vignette");
                    li.classList.remove("item-liste");
                }

            }
        }
    )
    containerNvApr.forEach(vignette => {
        if (buttonListe.checked) {
            vignette.classList.add("container-type--liste");
            vignette.classList.remove("container-type--vignette");

        }
        if (buttonVignette.checked) {
            vignette.classList.add("container-type--vignette");
            vignette.classList.remove("container-type--liste");

        }
    })

}

affichageToggle()
