let buttonListe = document.getElementById("disposition-droite");
let labelListe = document.getElementById("label-disposition");
let buttonVignette = document.getElementById("disposition-gauche");
let liste = document.querySelectorAll(".catalogue-liste li");
// let header = document.querySelector(".catalogue-header--liste")

function handleResize() {
    if (window.innerWidth >= 800) {
        buttonListe.disable = false;
        labelListe.classList.remove("toggle-disabled");

        buttonListe.addEventListener("click", affichageToggle);
        buttonVignette.addEventListener("click", affichageToggle);
        affichageToggle();

    } else {
        buttonListe.disable = true;
        labelListe.classList.add("toggle-disabled");
        buttonVignette.checked = true;

        buttonListe.removeEventListener("click", affichageToggle);
        buttonVignette.removeEventListener("click", affichageToggle);
        affichageToggle();
    }
    labelListe.addEventListener('click', function (event) {
        if (buttonListe.disable) {
            event.preventDefault();
        }
    })
}

window.addEventListener('resize', handleResize);

handleResize();

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

}

affichageToggle()
