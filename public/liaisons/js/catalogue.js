let buttonListe = document.getElementById("disposition-droite");
let buttonVignette = document.getElementById("disposition-gauche");
let liste = document.querySelectorAll(".catalogue-liste li");
let containerNvApr = document.querySelectorAll(".container-type")

// let header = document.querySelector(".catalogue-header--liste")

buttonListe.addEventListener("click", affichageToggle);
buttonVignette.addEventListener("click", affichageToggle);


function affichageToggle() {
    liste.forEach(li => {
            if (buttonListe.checked) {
                li.classList.add("item-liste");
                li.classList.remove("item-vignette");

                // header.classList.add("catalogue-header--liste")
                // header.classList.remove("header-hidden")
            }
            if (buttonVignette.checked) {
                li.classList.add("item-vignette");
                li.classList.remove("item-liste");

                // header.classList.remove("catalogue-header--liste")
                // header.classList.add("header-hidden")

            }
        }
    )
    containerNvApr.forEach(vignette => {
        if (buttonListe.checked) {
            vignette.classList.add("container-type--liste");
            vignette.classList.remove("container-type--vignette");

            // header.classList.add("catalogue-header--liste")
            // header.classList.remove("header-hidden")
        }
        if (buttonVignette.checked) {
            vignette.classList.add("container-type--vignette");
            vignette.classList.remove("container-type--liste");

            // header.classList.remove("catalogue-header--liste")
            // header.classList.add("header-hidden")

        }
    })

}

affichageToggle()
